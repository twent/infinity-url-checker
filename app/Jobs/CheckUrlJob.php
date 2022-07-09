<?php

namespace App\Jobs;

use App\Models\Url;
use App\Models\UrlCheck;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CheckUrlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Количество попыток выполнения задания.
     *
     * @var int
     */
    public int $tries = 10;

    /**
     * Количество секунд ожидания перед повторной попыткой выполнения задания.
     *
     * @var int
     */
    public int $backoff = 60;

    protected Url $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Url $url)
    {
        $this->url = $url;
        $this->tries = $url->fail_repeat_count;
    }

    /**
     * Execute the job.
     *
     */
    public function handle(): void
    {
        try {
            $response = Http::timeout(3)->get($this->url->url_address);

            if ($response->successful()) {
                $delay = now()->addMinutes($this->url->frequency);
                $this->url->attempts += 1;
                $this->url->fails = 0;

                UrlCheck::create([
                    'url_id' => $this->url->id,
                    'executed_at' => now(),
                    'success' => $response->successful(),
                    'answer_http_code' => $response->status(),
                    'attempt_number' => $this->url->attempts
                ]);

                $this->url->save();
                CheckUrlJob::dispatch($this->url)->delay($delay);
            }

            if ($response->failed()) {

                if ($response->clientError()) {
                    Log::debug(static::class . ": Http Ошибка клиента. URL: " . $this->url->url_address);
                    $response->throw($response->status());
                } else if ($response->serverError()) {
                    Log::debug(static::class . ": Http Ошибка сервера. URL: " . $this->url->url_address);
                    $response->throw($response->status());
                } else {
                    Log::debug(static::class . ": Превышен timout или другая ошибка. URL: " . $this->url->url_address);
                    $response->throw("Timeout or Other");
                }

            }

        } catch (Exception $e) {
            $this->fail($e);
        }

    }

    /**
     * Job Fail Processing.
     *
     * @param Exception $e
     * @return void
     */
    public function failed(Exception $e): void
    {
        $delay = now()->addMinutes(1);
        $this->url->fails +=1;
        $this->url->attempts += 1;

        if ($this->url->fails > $this->url->fail_repeat_count) {
            $this->delete();
        } else {
            Log::error(static::class . ": Ошибка. URL: " . $this->url->url_address . " Попытка: " . $this->url->attempts);

            UrlCheck::create([
                'url_id' => $this->url->id,
                'executed_at' => now(),
                'success' => false,
                'error_message' => mb_strstr($e->getMessage(), ':', true),
                'attempt_number' => $this->url->attempts
            ]);

            $this->url->save();
            CheckUrlJob::dispatch($this->url)->delay($delay);
        }

    }

}

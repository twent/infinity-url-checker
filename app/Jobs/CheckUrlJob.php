<?php

namespace App\Jobs;

use DateInterval, DateTimeInterface, Exception;
use App\Models\{Url, UrlCheck};
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\{InteractsWithQueue, SerializesModels};
use Illuminate\Support\Facades\Http;

class CheckUrlJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Url $url;

    /**
     * Количество попыток выполнения задания.
     *
     * @var int
     */
    public int $tries = 10;

    /**
     * Удалить задание, если экземпляр модели больше не существует
     *
     * @var bool
     */
    public bool $deleteWhenMissingModels = true;

    /**
     * Получить теги, которые назначаются заданию.
     *
     * @return array
     */
    public function tags(): array
    {
        return ['Processing URL:'.$this->url->url_address];
    }

    /**
     * Создание задания
     *
     * @return void
     */
    public function __construct(Url $url)
    {
        $this->onQueue('url_checks');
        $this->url = $url;
        $this->tries = $url->fail_repeat_count;
    }

    /**
     * Выполнение задания
     *
     */
    public function handle(): void
    {
        try {
            $response = Http::timeout(3)->get($this->url->url_address);

            if ($response->successful()) {
                $this->updateUrl(true);
                $delay = now()->addMinutes($this->url->frequency);

                $this->storeUrlCheck($response->status(),true);

                CheckUrlJob::dispatch($this->url)->delay($delay);
            }

            if ($response->failed()) {
                $response->throw('Error');
            }

        } catch (Exception $e) {
            $this->fail($e);
        }

    }

    /**
     * Обработка ошибки задания
     *
     * @param Exception $e
     * @return void
     */
    public function failed(Exception $e): void
    {
        if ($this->url->fails < $this->url->fail_repeat_count) {
            $this->updateUrl();
            $delay = now()->addMinute();
            $errorMessage = mb_strstr($e->getMessage(), ':', true);
            $this->storeUrlCheck($errorMessage);
            CheckUrlJob::dispatch($this->url)->delay($delay);
        } else {
            $this->delete();
        }

    }

    /*
     * Обновление связанной ссылки
    */
    private function updateUrl(bool $isSuccessful = false): void
    {
        $this->url->attempts += 1;
        $isSuccessful ? $this->url->fails = 0 : $this->url->fails += 1;
        $this->url->save();
    }

    /*
     * Создание записи о проверке в БД
    */
    private function storeUrlCheck(string $message, bool $isSuccessful = false): void
    {
        UrlCheck::create([
            'url_id' => $this->url->id,
            'executed_at' => now(),
            'is_success' => $isSuccessful,
            'answer_message' => $message,
            'attempt_number' => $this->url->attempts
        ]);
    }

}

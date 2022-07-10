<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{Builder, Model};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\UrlCheck
 *
 * @property int $id
 * @property int $url_id
 * @property Carbon $executed_at
 * @property bool $is_success
 * @property string $answer_message
 * @property int $attempt_number
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Url $url
 * @method static Builder|UrlCheck newModelQuery()
 * @method static Builder|UrlCheck newQuery()
 * @method static Builder|UrlCheck query()
 * @method static Builder|UrlCheck whereAnswerHttpCode($value)
 * @method static Builder|UrlCheck whereAttemptNumber($value)
 * @method static Builder|UrlCheck whereCreatedAt($value)
 * @method static Builder|UrlCheck whereErrorMessage($value)
 * @method static Builder|UrlCheck whereExecutedAt($value)
 * @method static Builder|UrlCheck whereId($value)
 * @method static Builder|UrlCheck whereSuccess($value)
 * @method static Builder|UrlCheck whereUpdatedAt($value)
 * @method static Builder|UrlCheck whereUrlId($value)
 * @mixin \Eloquent
 */

class UrlCheck extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'executed_at' => 'datetime',
    ];

    public function url(): belongsTo
    {
        return $this->belongsTo(Url::class, 'url_id', 'id');
    }

}

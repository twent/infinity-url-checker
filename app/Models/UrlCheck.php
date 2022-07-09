<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UrlCheck
 *
 * @property int $id
 * @property int $url_id
 * @property \Illuminate\Support\Carbon $executed_at
 * @property bool $success
 * @property int|null $answer_http_code
 * @property string|null $error_message
 * @property int $attempt_number
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Url $url
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck query()
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereAnswerHttpCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereAttemptNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereErrorMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereExecutedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UrlCheck whereUrlId($value)
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

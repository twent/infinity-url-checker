<?php

namespace App\Models;

use Database\Factories\UrlFactory;
use Illuminate\Database\Eloquent\{Builder, Collection, Model};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, hasOne};
use Illuminate\Support\Carbon;

/**
 * App\Models\Url
 *
 * @property int $id
 * @property string $url_address
 * @property int $frequency
 * @property int $fail_repeat_count
 * @property int $attempts
 * @property int $fails
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|UrlCheck[] $checks
 * @property-read int|null $checks_count
 * @property-read UrlCheck|null $latestCheck
 * @property-read UrlCheck|null $oldestCheck
 * @method static UrlFactory factory(...$parameters)
 * @method static Builder|Url newModelQuery()
 * @method static Builder|Url newQuery()
 * @method static Builder|Url query()
 * @method static Builder|Url whereAttempts($value)
 * @method static Builder|Url whereCreatedAt($value)
 * @method static Builder|Url whereFailRepeatCount($value)
 * @method static Builder|Url whereFails($value)
 * @method static Builder|Url whereFrequency($value)
 * @method static Builder|Url whereId($value)
 * @method static Builder|Url whereUpdatedAt($value)
 * @method static Builder|Url whereUrlAddress($value)
 * @mixin \Eloquent
 */

class Url extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function checks(): hasMany
    {
        return $this->hasMany(UrlCheck::class, 'url_id', 'id');
    }

    public function latestCheck(): hasOne
    {
        return $this->hasOne(UrlCheck::class)->latestOfMany();
    }

    public function oldestCheck(): hasOne
    {
        return $this->hasOne(UrlCheck::class)->oldestOfMany();
    }

}

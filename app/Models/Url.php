<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, hasOne};

/**
 * App\Models\Url
 *
 * @property int $id
 * @property string $url_address
 * @property int $frequency
 * @property int $fail_repeat_count
 * @property int $attempts
 * @property int $fails
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\UrlCheck[] $checks
 * @property-read int|null $checks_count
 * @property-read \App\Models\UrlCheck|null $latestCheck
 * @property-read \App\Models\UrlCheck|null $oldestCheck
 * @method static \Database\Factories\UrlFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Url newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Url newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Url query()
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereAttempts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereFailRepeatCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereFails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereFrequency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Url whereUrlAddress($value)
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

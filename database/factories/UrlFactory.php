<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    private array $frequencies = [1,5,10];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'url_address' => fake()->url(),
            'frequency' => $this->frequencies[array_rand($this->frequencies)],
            'fail_repeat_count' => rand(1,10)
        ];
    }

}

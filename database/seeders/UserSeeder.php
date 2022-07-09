<?php

namespace Database\Seeders;

use App\Models\Url;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Default User */
        User::factory()->create([
            'name' => 'User',
            'email' => 'test@example.com',
            'password' => '12345678'
        ]);

    }
}

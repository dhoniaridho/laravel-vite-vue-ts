<?php

namespace Database\Seeders;

use App\Models\Admin\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Setting::create([
            'app_name' => 'Laravel',
            'app_description' => 'Admin',
            'app_logo' => 'https://laravel.com/img/laravel-logo.png',
            'app_favicon' => 'https://laravel.com/favicon.ico',
            'app_email' => 'dhoniaridho@gmail.com',
        ]);
    }
}

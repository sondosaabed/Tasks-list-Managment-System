<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // To generate 10 users data on top of the existing data
        \App\Models\User::factory(10)->create();
        // mixed values of the models use unverfied
        \App\Models\User::factory(2)->unverified()->create();
        \App\Models\Task::factory(20)->create();     
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

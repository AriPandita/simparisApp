<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'admin',
                'email' => 'admin@cajuput.com',
                'email_verified_at' => '2024-03-22 00:19:40',
                'password' => '$2y$10$5HCFfkAVeH5uwQQ2sMCLRu6PEX8JMiQianfoCktyxVk6MNyxXDpDe' //12345678
            ]
        ]);
    }
}

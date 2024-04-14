<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Agrega esta línea
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            [
                'name' => 'David',
                'email' => 'david@gmail.com',
                'password' => Hash::make('password')
            ],
        ]);
    }
}

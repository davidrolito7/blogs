<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            [
                'user_id'=>\App\Models\User::all()->random()->id,
                'titulo' => 'Derivadas 1',
                'texto' => 'Es muy complicado',
                
            ],
        ]); 
    }
}

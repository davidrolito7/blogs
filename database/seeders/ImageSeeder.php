<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image;
class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::create([
            [
                'post_id'=>\App\Models\Post::all()->random()->id,
                'url' => 'Httt:/hola.com',
               
                
            ],
        ]); 
    }
}

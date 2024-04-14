<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Image;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

        $user = User::all()->random();

        // $post = Post::create([
        //     'user_id' => $user->id,
        //     'titulo' => 'Derivadas 1',
        //     'texto' => 'Es muy complicado',
        // ]);

        // $comment = Comment::create([
        //     'post_id' => $post->id,
        //     'texto' => 'Derivadas 1',
        // ]);

        // $image = Image::create([
        //     'post_id' => $post->id,
        //     'url' => 'http://hola.com',
        // ]);

        // $category = Category::create([
        //     'nombre' => 'Historia',
        // ]);
        $post = Post::create([
            'user_id' => $user->id,
            'titulo' => 'Web 1',
            'texto' => 'Divertido',
        ]);

        $comment = Comment::create([
            'post_id' => $post->id,
            'texto' => 'Me gusta mucho esta meteria',
        ]);

        $image = Image::create([
            'post_id' => $post->id,
            'url' => 'http://web.com.mx',
        ]);

        $category = Category::create([
            'nombre' => 'Progrmamcion web',
        ]);
        $post->categories()->attach($category->id);
    }
}

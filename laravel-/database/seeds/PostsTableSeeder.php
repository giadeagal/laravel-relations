<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++){

            $newPost = new Post;

            $newPost->title = 'Post numero ' . ($i + 1);
            $newPost->slug = Str::slug( $newPost->title, '-');
            $newPost->content = 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aspernatur, cupiditate? Nostrum animi, saepe aut, velit iste architecto esse nemo culpa natus autem laboriosam reprehenderit obcaecati voluptatum quos totam deleniti eum.';

            $newPost->save();
        }
    }
}

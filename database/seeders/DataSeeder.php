<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        User::truncate();
        Post::truncate();
        Comment::truncate();

        Category::factory(10)->create();
        User::factory(10)->create();
        Post::factory(25)->create();
        Comment::factory(40)->create();
        

        $user = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('admin123')
        ]);

        $user->is_admin = true;
        $user->save();
    }
}

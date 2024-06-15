<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyPosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create dummy data for posts
        DB::table('posts')->insert([
            [
                'title' => 'Sample Post 1',
                'seotitle' => 'sample-post-1',
                'user_id' => 1, // Example user ID, adjust as needed
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'image' => 'sample-image1.jpg',
                'hits' => 0,
                'active' => 'Yes',
                'status' => 'publish',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sample Post 2',
                'seotitle' => 'sample-post-2',
                'user_id' => 2, // Example user ID, adjust as needed
                'content' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image' => 'sample-image2.jpg',
                'hits' => 0,
                'active' => 'Yes',
                'status' => 'draft',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create dummy data for categories
        DB::table('categories')->insert([
            [
                'title' => 'Category 1',
                'seotitle' => 'category-1',
                'active' => 'Yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Category 2',
                'seotitle' => 'category-2',
                'active' => 'Yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more dummy data as needed
        ]);
    }
}

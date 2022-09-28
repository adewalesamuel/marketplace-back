<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this::makeCategoryFactory();
    }

    private function makeCategoryFactory() {
        \App\Models\Category::factory(5)->create();
        \App\Models\Category::factory(1)
        ->has(\App\Models\Category::factory(2), 'parent_category');
        \App\Models\Category::factory(1)    
        ->has(\App\Models\Category::factory(2), 'parent_category');
    }
}

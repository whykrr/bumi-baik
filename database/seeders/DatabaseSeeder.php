<?php

namespace Database\Seeders;

use App\Models\NewsArticle;
use App\Models\Tree;
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
        \App\Models\User::factory(10)->create();
        Tree::factory(20)->create();
        NewsArticle::factory(20)->create();
    }
}

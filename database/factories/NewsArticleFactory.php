<?php

namespace Database\Factories;

use Cocur\Slugify\Slugify;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // instance faker with locale
        $faker = \Faker\Factory::create('id_ID');

        //set title with language en_US 
        $title = $faker->sentence(6, true);
        $slugify = new Slugify();
        return [
            'title' => $title,
            'slug' => $slugify->slugify($title),
            'content' => $faker->paragraph(4, true),
            'image' => $faker->imageUrl(640, 480, 'nature', true),
            'author' => $faker->name(),
        ];
    }
}

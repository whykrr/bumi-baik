<?php

namespace Database\Seeders;

use App\Models\Planting;
use Illuminate\Database\Seeder;

class V1PlantingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        Planting::create([
            'name' => 'Penanaman Pohon Gondang',
            'partner_id' => 1,
            'tree_type_id' => 1,
            'description' => 'Penanaman 100 pohon gondang di lokasi penanaman di daerah Prigen, Kabupaten Pasuruan',
            'planting_date' => '2022-01-15',
            'image' => $faker->imageUrl(640, 480, 'nature', true, 'Faker'),
        ]);
    }
}

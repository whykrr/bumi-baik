<?php

namespace Database\Seeders;

use App\Models\Tree;
use Illuminate\Database\Seeder;

class V1ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $elevenYearAgo = date('Y-m-d', strtotime('-11 years'));

        $products = [
            [
                'type_id' => 1,
                'code' => 'BB2022AT1',
                'description' => "",
                'planting_date' => $elevenYearAgo,
                'image' => asset('asset/tree/BB2022AT1.jpg'),
                'latitude' => '-7.746807',
                'longitude' => '112.645341',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_id' => 1,
                'code' => 'BB2022AT2',
                'description' => "",
                'planting_date' => $elevenYearAgo,
                'image' => asset('asset/tree/BB2022AT2.jpg'),
                'latitude' => '-7.746642',
                'longitude' => '112.644934',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_id' => 2,
                'code' => 'BB2022AT6',
                'description' => "",
                'planting_date' => $elevenYearAgo,
                'image' => asset('asset/tree/BB2022AT6.jpg'),
                'latitude' => '-7.745902',
                'longitude' => '112.645547',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_id' => 2,
                'code' => 'BB2022AT7',
                'description' => "",
                'planting_date' => $elevenYearAgo,
                'image' => asset('asset/tree/BB2022AT7.jpg'),
                'latitude' => '-7.745735',
                'longitude' => '112.646035',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_id' => 3,
                'code' => 'BB2022AT9',
                'description' => "",
                'planting_date' => $elevenYearAgo,
                'image' => asset('asset/tree/BB2022AT9.jpg'),
                'latitude' => '-7.745868',
                'longitude' => '112.646116',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_id' => 3,
                'code' => 'BB2022AT10',
                'description' => "",
                'planting_date' => $elevenYearAgo,
                'image' => asset('asset/tree/BB2022AT10.jpg'),
                'latitude' => '-7.7459275',
                'longitude' => '112.646156',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        Tree::insert($products);
    }
}

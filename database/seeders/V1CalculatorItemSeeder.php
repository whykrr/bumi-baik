<?php

namespace Database\Seeders;

use App\Models\CalculatorItem;
use Illuminate\Database\Seeder;

class V1CalculatorItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate table
        CalculatorItem::truncate();

        $data = [
            [
                'type' => 'fuel',
                'name' => 'Solar',
                'price_per_unit' => 6800,
                "carbon_offset" => 2.30,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'fuel',
                'name' => 'Pertalite',
                'price_per_unit' => 10000,
                "carbon_offset" => 2.30,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'fuel',
                'name' => 'Pertamax',
                'price_per_unit' => 14500,
                "carbon_offset" => 2.30,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'fuel',
                'name' => 'Pertamax Turbo',
                'price_per_unit' => 15900,
                "carbon_offset" => 2.30,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'fuel',
                'name' => 'Dexlite',
                'price_per_unit' => 17100,
                "carbon_offset" => 2.30,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'fuel',
                'name' => 'Pertamina Dex',
                'price_per_unit' => 17400,
                "carbon_offset" => 2.30,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'electricity',
                'name' => 'Subsidi',
                'price_per_unit' => 1352.0,
                "carbon_offset" => 0.37,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'electricity',
                'name' => 'Non Subsidi',
                'price_per_unit' => 1444.7,
                "carbon_offset" => 0.37,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'gas',
                'name' => 'Subsidi',
                'price_per_unit' => 7000.0,
                "carbon_offset" => 1.51,
                "created_at" => now(),
                "updated_at" => now(),
            ],
            [
                'type' => 'gas',
                'name' => 'Non Subsidi',
                'price_per_unit' => 15500.0,
                "carbon_offset" => 1.51,
                "created_at" => now(),
                "updated_at" => now(),
            ],
        ];

        // Insert data
        CalculatorItem::insert($data);
    }
}

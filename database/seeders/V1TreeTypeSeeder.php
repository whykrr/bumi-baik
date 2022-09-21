<?php

namespace Database\Seeders;

use App\Models\TreeType;
use Illuminate\Database\Seeder;

class V1TreeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $treeTypes = [
            [
                'partner_id' => 1,
                'name' => 'Pohon Gondang',
                'description' => 'Pohon bernama ilmiah Ficus variegata',
                'sequestration' => 1099.43,
            ],
            [
                'partner_id' => 1,
                'name' => 'Pohon Kemiri',
                'description' => 'Pohon bernama ilmiah Aleurites moluccana',
                'sequestration' => 1081.11,
            ],
            [
                'partner_id' => 1,
                'name' => 'Pohon Abar',
                'description' => 'Pohon bernama ilmiah Ficus rumphii',
                'sequestration' => 1003.21,
            ],
        ];

        // Insert data ke table tree_types
        TreeType::insert($treeTypes);
    }
}

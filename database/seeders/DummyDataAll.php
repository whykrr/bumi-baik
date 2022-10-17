<?php

namespace Database\Seeders;

use App\Models\Partner;
use App\Models\Planting;
use App\Models\Tree;
use Illuminate\Database\Seeder;

class DummyDataAll extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partner = new Partner();
        $partner->name = 'Dummy Partner';
        $partner->email = 'dummy-partner@email.com';
        $partner->phone = '081234567890';
        $partner->address = 'Dummy Address';
        $partner->photo = 'dummy-photo.jpg';

        $tree = [
            [
                'id' => 111,
                'type_id' => rand(1, 3),
                'code' => 'TESTTRE' . rand(100000, 999999),
                'planting_date' => date('Y-m-d', strtotime('-11 years')),
                'image' => '',
                'latitude' => -6.175392,
                'longitude' => 106.865036,
            ],
            [
                'id' => 112,
                'type_id' => 1,
                'code' => 'TESTTRE' . rand(100000, 999999),
                'planting_date' => date('Y-m-d', strtotime('+1 month')),
                'image' => '',
                'latitude' => -6.175395,
                'longitude' => 106.865037,
            ]
        ];

        // save to tree table
        Tree::insert($tree);

        // save to planting table
        $planting = new Planting();
        $planting->name = 'Test Planting';
        $planting->partner_id = 1;
        $planting->tree_type_id = 1;
        $planting->description = 'Test Planting';
        $planting->planting_date = date('Y-m-d', strtotime('+1 month'));
        $planting->image = '';

        $vouchers = [
            [
                'code' => 'TESTADOPT',
                'type' => 'adopt',
                'tree_id' => 111,
                'description' => 'Voucher untuk adopt tree',
                'term' => 'Voucher ini hanya berlaku untuk adopt tree',
                'value' => 50000,
                'qty_tree' => 1,
                'quota' => 1000,
            ],
            [
                'code' => 'TESTPLANTING',
                'type' => 'planting',
                'planting_id' => $planting->id,
                'description' => 'Voucher untuk tree planting',
                'term' => 'Voucher ini hanya berlaku untuk tree planting',
                'value' => 200000,
                'qty_tree' => 1,
                'quota' => 1000,
            ],
        ];
    }
}

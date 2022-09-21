<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Seeder;

class V1VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Voucher::create([
            'code' => 'BL21SEP',
            'type' => 'adopt',
            'tree_id' => 1,
            'planting_id' => null,
            'description' => "Beta Launching 21 September",
            'terms' => "Voucher ini hanya berlaku untuk Undangan Beta Launching 21 September 2021",
            'value' => 50000,
            'qty_tree' => 1,
            'quota' => 100,
        ]);
    }
}

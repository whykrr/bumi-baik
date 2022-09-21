<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class V1PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partner::create([
            'name' => 'Hutan Cempaka',
            'email' => 'info@cempakafoundation.org',
            'phone' => '6281216742910',
            'address' => 'Hutan Cempaka, Gamoh, Dayurejo, Kec. Prigen, Pasuruan, Jawa Timur 67157',
            'photo' => 'https://www.cempakafoundation.org/img/gk1.jpg',
            'latitude' => '-7.743749',
            'longitude' => '112.656166',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;


class SponsorshipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newSponsor1= new Sponsorship();
        $newSponsor1 -> type = 'One day';
        $newSponsor1 -> price = 2.99;
        $newSponsor1 -> duration = '24:00:00';
        $newSponsor1->save();

        $newSponsor2= new Sponsorship();
        $newSponsor2 -> type = 'Three days';
        $newSponsor2 -> price = 5.99;
        $newSponsor2 -> duration = '72:00:00';
        $newSponsor2->save();

        $newSponsor3= new Sponsorship();
        $newSponsor3 -> type = 'Six days';
        $newSponsor3 -> price = 9.99;
        $newSponsor3 -> duration = '144:00:00';
        $newSponsor3->save();
        
    }
}

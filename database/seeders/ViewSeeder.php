<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\View;
use App\Models\Apartment;
use Faker\Generator as Faker;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::All();
        foreach ($apartments as $apartment) {
            for ($i=0; $i < 10; $i++) {
                $newView = new View();
                $newView->apartment_id = $apartment->id;
                $newView->address_ip = $faker->ipv4();
                $newView->date_visit = $faker->dateTimeBetween('-1 week', 'now');
                $newView->save();
            }
        }
    }
}

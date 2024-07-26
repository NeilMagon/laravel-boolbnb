<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Numero di appartamenti da collegare
        $numberOfApartments = 20;

        // Imposta i limiti per il numero casuale di servizi da collegare
        $minNumberOfServices = 4; // Numero minimo di servizi
        $maxNumberOfServices = 15; // Numero massimo di servizi

        for ($i = 1; $i <= $numberOfApartments; $i++) {
            $apartment = Apartment::find($i);

            // Controlla che l'appartamento esista
            if ($apartment) {
                // Genera un numero casuale di servizi da collegare
                $numberOfServices = rand($minNumberOfServices, $maxNumberOfServices);

                // Seleziona servizi casuali
                $services = Service::inRandomOrder()->take($numberOfServices)->get();

                // Collega l'appartamento ai servizi trovati
                foreach ($services as $service) {
                    $apartment->services()->attach($service);
                }
            }
        }
    }
}

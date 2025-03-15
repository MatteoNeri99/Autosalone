<?php

namespace Database\Seeders;

use App\Models\Auto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $autosData = [
            [
                'anno' => 2022, 'marca' => 'Fiat', 'modello' => 'Panda', 'tipologia' => 'City Car',
                'cilindrata' => 1200, 'cavalli' => 69, 'emissioni' => 'Euro 6', 'carburante' => 'Benzina',
                'km' => 15000, 'colore' => 'Rosso', 'posti' => 5, 'porte' => 5, 'prezzo' => 12000,
                'nuova' => false, 'foto' => 'imgAuto/fiat_panda.jpg'
            ],
            [
                'anno' => 2023, 'marca' => 'BMW', 'modello' => 'Serie 3', 'tipologia' => 'Berlina',
                'cilindrata' => 2000, 'cavalli' => 190, 'emissioni' => 'Euro 6', 'carburante' => 'Diesel',
                'km' => 5000, 'colore' => 'Nero', 'posti' => 5, 'porte' => 4, 'prezzo' => 35000,
                'nuova' => true, 'foto' => 'imgAuto/bmw_serie3.jpg'
            ],
            [
                'anno' => 2021, 'marca' => 'Audi', 'modello' => 'A4', 'tipologia' => 'Berlina',
                'cilindrata' => 1900, 'cavalli' => 150, 'emissioni' => 'Euro 6', 'carburante' => 'Diesel',
                'km' => 30000, 'colore' => 'Grigio', 'posti' => 5, 'porte' => 4, 'prezzo' => 28000,
                'nuova' => false, 'foto' => 'imgAuto/audi_a4.jpg'
            ],
            [
                'anno' => 2020, 'marca' => 'Mercedes', 'modello' => 'Classe A', 'tipologia' => 'Hatchback',
                'cilindrata' => 1600, 'cavalli' => 136, 'emissioni' => 'Euro 6', 'carburante' => 'Benzina',
                'km' => 25000, 'colore' => 'Bianco', 'posti' => 5, 'porte' => 5, 'prezzo' => 32000,
                'nuova' => false, 'foto' => 'imgAuto/mercedes_classeA.jpg'
            ],
            [
                'anno' => 2024, 'marca' => 'Tesla', 'modello' => 'Model 3', 'tipologia' => 'Elettrica',
                'cilindrata' => 0, 'cavalli' => 283, 'emissioni' => 'Zero', 'carburante' => 'Elettrico',
                'km' => 1000, 'colore' => 'Blu', 'posti' => 5, 'porte' => 4, 'prezzo' => 45000,
                'nuova' => true, 'foto' => 'imgAuto/tesla_model3.jpg'
            ],
            [
                'anno' => 2019, 'marca' => 'Volkswagen', 'modello' => 'Golf', 'tipologia' => 'Hatchback',
                'cilindrata' => 1500, 'cavalli' => 130, 'emissioni' => 'Euro 6', 'carburante' => 'Diesel',
                'km' => 40000, 'colore' => 'Argento', 'posti' => 5, 'porte' => 5, 'prezzo' => 20000,
                'nuova' => false, 'foto' => 'imgAuto/vw_golf.jpg'
            ],
            [
                'anno' => 2022, 'marca' => 'Ford', 'modello' => 'Focus', 'tipologia' => 'Berlina',
                'cilindrata' => 1500, 'cavalli' => 120, 'emissioni' => 'Euro 6', 'carburante' => 'Benzina',
                'km' => 18000, 'colore' => 'Nero', 'posti' => 5, 'porte' => 4, 'prezzo' => 22000,
                'nuova' => false, 'foto' => 'imgAuto/ford_focus.jpg'
            ],
            [
                'anno' => 2023, 'marca' => 'Toyota', 'modello' => 'Corolla', 'tipologia' => 'Hybrid',
                'cilindrata' => 1800, 'cavalli' => 122, 'emissioni' => 'Euro 6', 'carburante' => 'Ibrido',
                'km' => 8000, 'colore' => 'Rosso', 'posti' => 5, 'porte' => 5, 'prezzo' => 25000,
                'nuova' => true, 'foto' => 'imgAuto/toyota_corolla.jpg'
            ],
            [
                'anno' => 2021, 'marca' => 'Peugeot', 'modello' => '208', 'tipologia' => 'City Car',
                'cilindrata' => 1200, 'cavalli' => 100, 'emissioni' => 'Euro 6', 'carburante' => 'Benzina',
                'km' => 22000, 'colore' => 'Giallo', 'posti' => 5, 'porte' => 5, 'prezzo' => 18000,
                'nuova' => false, 'foto' => 'imgAuto/peugeot_208.jpg'
            ],
            [
                'anno' => 2020, 'marca' => 'Jeep', 'modello' => 'Renegade', 'tipologia' => 'SUV',
                'cilindrata' => 1600, 'cavalli' => 120, 'emissioni' => 'Euro 6', 'carburante' => 'Diesel',
                'km' => 35000, 'colore' => 'Verde', 'posti' => 5, 'porte' => 5, 'prezzo' => 27000,
                'nuova' => false, 'foto' => 'imgAuto/jeep_renegade.jpg'
            ]
        ];

        foreach($autosData as $autoData){
            $autoData = new Auto($autoData);
            $autoData->save();

        }


    }


}

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
                'anno' => 2022, 'marca' => 'Fiat', 'modello' => 'Panda', 'tipologia_id' => rand(1, 25),
                'cilindrata' => 1200, 'cavalli' => 69, 'emissioni' => 'Euro 6', 'carburante_id' => rand(1, 8),
                'km' => 15000, 'colore' => 'Rosso', 'posti' => 5, 'porte' => 5, 'prezzo' => 12000,
                'nuova' => false, 'foto' => 'imgAuto/fiat_panda.jpg'
            ],
            [
                'anno' => 2023, 'marca' => 'BMW', 'modello' => 'Serie 3', 'tipologia_id' => rand(1, 25),
                'cilindrata' => 2000, 'cavalli' => 190, 'emissioni' => 'Euro 6', 'carburante_id' => rand(1, 8),
                'km' => 5000, 'colore' => 'Nero', 'posti' => 5, 'porte' => 4, 'prezzo' => 35000,
                'nuova' => true, 'foto' => 'imgAuto/bmw_serie3.jpg'
            ],
            [
                'anno' => 2021, 'marca' => 'Audi', 'modello' => 'A4', 'tipologia_id' => rand(1, 25),
                'cilindrata' => 1900, 'cavalli' => 150, 'emissioni' => 'Euro 6', 'carburante_id' => rand(1, 8),
                'km' => 30000, 'colore' => 'Grigio', 'posti' => 5, 'porte' => 4, 'prezzo' => 28000,
                'nuova' => false, 'foto' => 'imgAuto/audi_a4.jpg'
            ],
            [
                'anno' => 2020, 'marca' => 'Mercedes', 'modello' => 'Classe A', 'tipologia_id' => rand(1, 25),
                'cilindrata' => 1600, 'cavalli' => 136, 'emissioni' => 'Euro 6', 'carburante_id' => rand(1, 8),
                'km' => 25000, 'colore' => 'Bianco', 'posti' => 5, 'porte' => 5, 'prezzo' => 32000,
                'nuova' => false, 'foto' => 'imgAuto/mercedes_classeA.jpg'
            ],
            [
                'anno' => 2024, 'marca' => 'Tesla', 'modello' => 'Model 3', 'tipologia_id' => rand(1, 25),
                'cilindrata' => 0, 'cavalli' => 283, 'emissioni' => 'Zero', 'carburante_id' => rand(1, 8),
                'km' => 1000, 'colore' => 'Blu', 'posti' => 5, 'porte' => 4, 'prezzo' => 45000,
                'nuova' => true, 'foto' => 'imgAuto/tesla_model3.jpg'
            ]
        ];



        foreach($autosData as $autoData){
            $autoData = new Auto($autoData);
            $autoData->save();

        }


    }


}

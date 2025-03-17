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



        $autosData = [];

        for ($i = 0; $i < 100; $i++) {
            $autosData[] = [
                'anno' => rand(2015, 2024),
                'marca' => ['Fiat', 'BMW', 'Audi', 'Mercedes', 'Tesla', 'Ford', 'Volkswagen', 'Renault', 'Peugeot', 'Toyota'][rand(0, 9)],
                'modello' => ['Panda', 'Serie 3', 'A4', 'Classe A', 'Model 3', 'Focus', 'Golf', 'Clio', '208', 'Yaris'][rand(0, 9)],
                'tipologia_id' => rand(1, 25),
                'cilindrata' => rand(1000, 3000),
                'cavalli' => rand(70, 400),
                'emissioni' => rand(0, 1) ? 'Euro 6' : 'Zero',
                'carburante_id' => rand(1, 8),
                'km' => rand(0, 100000),
                'colore' => ['Rosso', 'Nero', 'Grigio', 'Bianco', 'Blu', 'Verde', 'Giallo'][rand(0, 6)],
                'posti' => rand(2, 7),
                'porte' => rand(2, 5),
                'prezzo' => rand(8000, 50000),
                'nuova' => rand(0, 1) ? true : false,
                'descrizione' => 'Descrizione auto generata automaticamente.',
                'foto' => json_encode([
                    'storage/imgAuto/2rHmmAJZCRGQo7IeyS9CIvQG9J6wDX7x0Dfvlq5b.jpg'
                ])
            ];
        }




        foreach($autosData as $autoData){
            $autoData = new Auto($autoData);
            $autoData->save();

        }


    }


}

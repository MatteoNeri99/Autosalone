<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class AutoController extends Controller
{
    // Metodo per mostrare la lista delle auto
    public function index()
    {
        $auto = Auto::all();
        return view('auto.index', compact('auto'));
    }






     // Metodo per mostrare i dettagli di una singola auto
    public function show($id)
    {
        // Trova l'auto con l'id specificato
        $auto = Auto::findOrFail($id);

        return view('auto.show', compact('auto'));
    }






    // Metodo per mostrare il form di creazione dell'auto
    public function create()
    {
        return view('auto.create');
    }





    public function store(Request $request)
    {
        // Validazione dei dati
        $data = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'anno' => 'required|integer',
            'marca' => 'required|string|max:255',
            'modello' => 'required|string|max:255',
            'tipologia' => 'required|string|max:255',
            'cilindrata' => 'required|integer',
            'cavalli' => 'required|integer',
            'emissioni' => 'required|string|max:255',
            'carburante' => 'required|string|max:255',
            'km' => 'required|integer',
            'colore' => 'required|string|max:255',
            'posti' => 'required|integer',
            'porte' => 'required|integer',
            'prezzo' => 'required|integer',
            'nuova' => 'required|boolean',
        ]);

        // Creazione di un nuovo oggetto Auto
        $auto = new Auto();
        $auto->anno = $data['anno'];
        $auto->marca = $data['marca'];
        $auto->modello = $data['modello'];
        $auto->tipologia = $data['tipologia'];
        $auto->cilindrata = $data['cilindrata'];
        $auto->cavalli = $data['cavalli'];
        $auto->emissioni = $data['emissioni'];
        $auto->carburante = $data['carburante'];
        $auto->km = $data['km'];
        $auto->colore = $data['colore'];
        $auto->posti = $data['posti'];
        $auto->porte = $data['porte'];
        $auto->prezzo = $data['prezzo'];
        $auto->nuova = $data['nuova'];

            // Controllo se è stata caricata un'immagine
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('imgAuto', 'public');
            $auto->foto = $imagePath;
        }

        $auto->save();

        // Redirect con messaggio di successo
        return redirect()->route('auto.index')->with('success', 'Auto aggiunta con successo!');
    }




    // Metodo per mostrare il form di modifica dell'auto
    public function edit($id)
    {
        $auto = Auto::findOrFail($id);

        return view('auto.edit', compact('auto'));
    }




    // Metodo per aggiornare i dati di un'auto nel database
    public function update(Request $request, $id)
    {
        // Validazione dei dati
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'anno' => 'required|integer',
            'marca' => 'required|string|max:255',
            'modello' => 'required|string|max:255',
            'cilindrata' => 'required|integer',
            'cavalli' => 'required|integer',
            'emissioni' => 'required|string|max:255',
            'carburante' => 'required|string|max:255',
            'km' => 'required|integer',
            'colore' => 'required|string|max:255',
            'posti' => 'required|integer',
            'porte' => 'required|integer',
            'prezzo' => 'required|integer',
            'nuova' => 'required|boolean',
        ]);

        $auto = Auto::findOrFail($id);

        // Se l'utente carica una nuova immagine, aggiorna il percorso
        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('imgAuto', 'public');
            $auto->foto = $imagePath;
        }

        $auto->update([
            'anno' => $request->anno,
            'marca' => $request->marca,
            'modello' => $request->modello,
            'cilindrata' => $request->cilindrata,
            'cavalli' => $request->cavalli,
            'emissioni' => $request->emissioni,
            'carburante' => $request->carburante,
            'km' => $request->km,
            'colore' => $request->colore,
            'posti' => $request->posti,
            'porte' => $request->porte,
            'prezzo' => $request->prezzo,
            'nuova' => $request->nuova,
        ]);

        return redirect()->route('auto.index')->with('success', 'Auto aggiornata con successo!');
    }









    // Metodo per eliminare un'auto dal database
    public function destroy($id)
    {
        $auto = Auto::findOrFail($id);

        // Elimina il record dal database
        $auto->delete();

        return redirect()->route('auto.index')->with('success', 'Auto eliminata con successo!');
    }
}



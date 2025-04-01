<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    // Restituisce tutte le auto
    public function index(Request $request)
    {
        $query = Auto::with(['carburante', 'tipologia']); // Includi relazioni

        // Filtri opzionali
        if ($request->filled('marca')) {
            $query->where('marca', 'LIKE', '%' . $request->marca . '%');
        }

        if ($request->filled('modello')) {
            $query->where('modello', 'LIKE', '%' . $request->modello . '%');
        }

        if ($request->filled('anno')) {
            $query->where('anno', $request->anno);
        }

        if ($request->filled('cilindrata')) {
            $query->where('cilindrata', '>=', $request->cilindrata);
        }

        if ($request->filled('cavalli')) {
            $query->where('cavalli', '>=', $request->cavalli);
        }

        if ($request->filled('emissioni')) {
            $query->where('emissioni', $request->emissioni);
        }

        if ($request->filled('km')) {
            $query->where('km', '<=', $request->km);
        }

        if ($request->filled('colore')) {
            $query->where('colore', 'LIKE', '%' . $request->colore . '%');
        }

        if ($request->filled('posti')) {
            $query->where('posti', $request->posti);
        }

        if ($request->filled('porte')) {
            $query->where('porte', $request->porte);
        }

        if ($request->filled('prezzo_min')) {
            $query->where('prezzo', '>=', $request->prezzo_min);
        }

        if ($request->filled('prezzo_max')) {
            $query->where('prezzo', '<=', $request->prezzo_max);
        }

        if ($request->filled('nuova')) {
            $query->where('nuova', filter_var($request->nuova, FILTER_VALIDATE_BOOLEAN));
        }

        if ($request->filled('carburante_id')) {
            $query->where('carburante_id', $request->carburante_id);
        }

        // Recupera le auto filtrate
        $autos = $query->get();

        // Modifica il campo delle immagini e sostituisce ID con nome
        $autos->each(function ($auto) {
            // Decodifica l'array di immagini e aggiungi il percorso completo
            $auto->immagini = collect(json_decode($auto->foto))->map(function ($img) {
                return url('storage/' . $img);
            });

            // Sostituisci l'ID con il nome delle relazioni
            $auto->carburante = $auto->carburante ? $auto->carburante->nome : null;
            $auto->tipologia = $auto->tipologia ? $auto->tipologia->nome : null;
        });

        return response()->json($autos);
    }

    public function show($id)
    {
        $auto = Auto::find($id);

        if (!$auto) {
            return response()->json(['message' => 'Auto non trovata'], 404);
        }

        // Decodifica l'array JSON e aggiunge il percorso completo
        $auto->immagini = collect(json_decode($auto->foto))->map(function ($img) {
            return url('storage/' . $img);
        });

        $auto->carburante_nome = $auto->carburante ? $auto->carburante->nome : null;
        $auto->tipologia_nome = $auto->tipologia ? $auto->tipologia->nome : null;


        return response()->json($auto, 200);
    }




}

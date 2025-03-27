<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Auto;
use Illuminate\Http\Request;

class AutoController extends Controller
{
    // Restituisce tutte le auto
    public function index()
    {
        $autos = Auto::all();

        // Modifica il campo delle immagini per restituire l'URL completo
        $autos->each(function ($auto) {
            // Decodifica l'array di immagini e aggiungi il percorso completo
            $auto->immagini = collect(json_decode($auto->foto))->map(function ($img) {
                return url('storage/' . $img); // Usa url() invece di asset()
            });
        });

        return response()->json($autos);
    }

    // Mostra i dettagli di un'auto specifica
    public function show($id)
    {
        $auto = Auto::find($id);

        if (!$auto) {
            return response()->json(['message' => 'Auto non trovata'], 404);
        }

        return response()->json($auto, 200);
    }

    // Ricerca avanzata per auto
    public function search(Request $request)
    {
        $query = Auto::query();

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

        return response()->json($query->get(), 200);
    }
}

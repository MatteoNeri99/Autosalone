@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dettagli Auto</h1>

    <div class="card">
        <img src="{{ asset('storage/' . $auto->foto) }}" class="card-img-top" alt="Foto auto" style="height: 200px; object-fit: cover;">
        <div class="card-body">
            <h5 class="card-title">{{ $auto->marca }} {{ $auto->modello }}</h5>
            <p class="card-text">Anno: {{ $auto->anno }}</p>
            <p class="card-text">Cilindrata: {{ $auto->cilindrata }} CC</p>
            <p class="card-text">Tipologia: {{ $auto->tipologia->nome }}</p>
            <p class="card-text">Cavalli: {{ $auto->cavalli }} CV</p>
            <p class="card-text">Carburante: {{ $auto->carburante->nome }}</p>
            <p class="card-text">Km: {{ $auto->km }} km</p>
            <p class="card-text">Colore: {{ $auto->colore }}</p>
            <p class="card-text">Posti: {{ $auto->posti }}</p>
            <p class="card-text">Porte: {{ $auto->porte }}</p>
            <p class="card-text">Prezzo: €{{ number_format($auto->prezzo, 2) }}</p>
            <p class="card-text">Emissioni: {{ $auto->emissioni }}</p>
            <p class="card-text">Nuova: {{ $auto->nuova ? 'Sì' : 'No' }}</p>
        </div>
    </div>
</div>
@endsection

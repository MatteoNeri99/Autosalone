@vite(['resources/js/show.js'])
@vite(['resources/sass/show.scss'])

@extends('layouts.app')

@section('content')

<div class="background">

    <div class="card-container">

        <div class="carousel-container">

            <button id="prevBtn" class="carousel-btn">❮</button>

            <div class="carousel">
                @foreach(json_decode($auto->foto, true) as $foto)
                    <img src="{{ asset('storage/' . $foto) }}" alt="Foto Auto" class="carousel-img ">
                @endforeach
            </div>

            <button id="nextBtn" class="carousel-btn">❯</button>

        </div>

        <div class="card-body dettagli">
            <h1>Dettagli Auto</h1>
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
            <p class="card-text">Condizione: {{ $auto->nuova ? 'Nuova' : 'Usata' }}</p>
        </div>
    </div>

    <div class="descrizione">
        <h2>descrizione :</h2>
        <p>{{ $auto->descrizione }}</p>
    </div>

</div>
@endsection




@vite(['resources/sass/index.scss'])
@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="contenitore">



        <form class="form" method="GET" action="{{ route('auto.search') }}">
            <div class="form-group filtro">
                <label for="marca">Marca</label>
                <input type="text" name="marca" class="form-control" value="{{ request('marca') }}">
            </div>

            <div class="form-group filtro">
                <label for="anno">Anno</label>
                <input type="number" name="anno" class="form-control" value="{{ request('anno') }}">
            </div>

            <div class="form-group filtro">
                <label for="prezzo_min">Prezzo Minimo</label>
                <input type="number" name="prezzo_min" class="form-control" value="{{ request('prezzo_min') }}">
            </div>

            <div class="form-group filtro">
                <label for="prezzo_max">Prezzo Massimo</label>
                <input type="number" name="prezzo_max" class="form-control" value="{{ request('prezzo_max') }}">
            </div>

            <div class="form-group filtro">
                <label for="nuova">Condizione</label>
                <select name="nuova" class="form-control">
                    <option value="">Tutte</option>
                    <option value="1" {{ request('nuova') == '1' ? 'selected' : '' }}>Nuova</option>
                    <option value="0" {{ request('nuova') == '0' ? 'selected' : '' }}>Usata</option>
                </select>
            </div>

            <div class="form-group filtro">
                <label for="tipologia_id">Tipologia</label>
                <select name="tipologia_id" class="form-control">
                    <option value="">Tutte</option>
                    @foreach($tipologie as $tipologia)
                        <option value="{{ $tipologia->id }}" {{ request('tipologia_id') == $tipologia->id ? 'selected' : '' }}>
                            {{ $tipologia->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group filtro">
                <label for="carburante_id">Carburante</label>
                <select name="carburante_id" class="form-control">
                    <option value="">Tutti</option>
                    @foreach($carburanti as $carburante)
                        <option value="{{ $carburante->id }}" {{ request('carburante_id') == $carburante->id ? 'selected' : '' }}>
                            {{ $carburante->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group filtro">
                <label for="colore">Colore</label>
                <input type="text" name="colore" class="form-control" value="{{ request('colore') }}">
            </div>

            <button type="submit" class="btn btn-primary">Filtra</button>
        </form>


        <div class="row contenitore-card">
            @foreach($auto as $auto)
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        @php
                            $immagini = json_decode($auto->foto, true);
                        @endphp

                        @if(!empty($immagini) && is_array($immagini))
                            <img src="{{ asset('storage/' . $immagini[0]) }}" class="card-img-top" alt="{{ $auto->marca }} {{ $auto->modello }}">
                        @else
                            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Immagine non disponibile">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $auto->marca }} {{ $auto->modello }}</h5>
                            <p class="card-text"><strong>Anno:</strong> {{ $auto->anno }}</p>
                            <p class="card-text"><strong>Prezzo:</strong> €{{ number_format($auto->prezzo, 2, ',', '.') }}</p>
                            <p class="card-text"><strong>KM:</strong> {{ $auto->km ?? 'N/A' }}</p>
                            <p class="card-text"><strong>Condizione:</strong>
                                <span class="badge {{ $auto->nuova ? 'bg-success' : 'bg-warning' }}">
                                    {{ $auto->nuova ? 'Nuova' : 'Usata' }}
                                </span>
                            </p>
                            <a href="{{ route('auto.show', $auto) }}" class="btn btn-primary">Dettagli</a>
                            <a href="{{ route('auto.edit', $auto) }}" class="btn btn-warning">Modifica</a>
                            <form action="{{ route('auto.destroy', $auto) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler eliminare questa auto?');">Elimina</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

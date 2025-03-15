@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Le Nostre Auto</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($auto as $auto)
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    @if($auto->foto)
                        <img src="{{ asset('storage/' . $auto->foto) }}" class="card-img-top" alt="{{ $auto->marca }} {{ $auto->modello }}">
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
@endsection

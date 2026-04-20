@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0">Gestione Destinazioni</h2>
            <p class="text-muted">Visualizza e gestisci tutti i pacchetti di viaggio</p>
        </div>
        <a href="{{route('admin.destinations.create')}}" class="btn btn-primary px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Aggiungi Destinazione
        </a>
    </div>
    @if(count($destinations) > 0)
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary small text-uppercase">
                        <tr>
                            <th class="ps-4">Copertina</th>
                            <th>Titolo / Paese</th>
                            <th>Prezzo</th>
                            <th>Durata</th>
                            <th class="text-end pe-4">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($destinations as $destination)
                        <tr>
                            <td class="ps-4">
                                <div class="rounded-circle overflow-hidden border shadow-sm" style="width: 50px; height: 50px;">
                                    <img src="{{ asset('img/default-placeholder.png') }}" alt="Immagine di default" class="w-100 h-100 object-fit-cover">
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark">{{$destination->title}}</div>
                                <div class="small text-muted">{{$destination->country->name}}</div>
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success fw-medium px-3 py-2">
                                    € {{$destination->price_person ?? "N/D"}}
                                </span>
                            </td>
                            <td>
                                @if($destination->duration)
                                <div class="text-dark">{{ $destination->duration }} {{ $destination->duration == 1 ? 'Giorno' : 'Giorni' }}</div>
                                @else
                                <div class="text-dark"> Da definire</div>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group shadow-sm border rounded">
                                    <a href="{{route ('admin.destinations.show', $destination)}}" class="btn btn-white btn-sm px-3" title="Vedi"><i class="bi bi-eye text-primary"></i></a>
                                    <a href="#" class="btn btn-white btn-sm px-3 border-start border-end" title="Modifica"><i class="bi bi-pencil text-warning"></i></a>
                                    <a href="#" class="btn btn-white btn-sm px-3 text-danger" title="Elimina"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="card border-0 shadow-sm mt-4">
    <div class="card-body py-5 text-center">
        <div class="display-1 text-muted opacity-25 mb-3">
            <i class="bi bi-map"></i>
        </div>
        <h4 class="fw-bold text-secondary">Nessuna destinazione trovata</h4>
        <p class="text-muted mx-auto" style="max-width: 400px;">
            Sembra che non ci siano ancora mete turistiche registrate nel sistema.
            Inizia aggiungendo la prima destinazione per popolare il tuo catalogo viaggi.
        </p>
    </div>
</div>
@endif
@endsection
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

                                    <img src="{{$destination->cover_image ? asset('storage/' . $destination->cover_image) : asset('img/default-placeholder.png') }}" alt="Immagine di default" class="w-100 h-100 object-fit-cover">
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
                                    <button class="btn btn-white btn-sm px-3 text-danger" data-bs-toggle="modal" data-bs-target="#{{$destination->id}}" title="Elimina"><i class="bi bi-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        <!-- modal -->
                        <div class="modal fade" id="{{$destination->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-danger bg-opacity-10 border-bottom-0 pb-0">
                                        <h5 class="modal-title fw-bold text-danger" id="deleteModalLabel">
                                            <i class="bi bi-exclamation-triangle-fill me-2"></i>Conferma Eliminazione
                                        </h5>
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="bi bi-trash3 text-danger fs-1 opacity-25"></i>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <p class="mb-1 fw-bold text-dark">Stai per eliminare la destinazione: <span class="text-danger">"{{ $destination->title }}"</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0 pt-0">
                                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{route ('admin.destinations.destroy', $destination)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-4 shadow-sm fw-bold">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
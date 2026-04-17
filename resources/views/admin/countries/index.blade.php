@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark">Paesi</h2>
            <p class="text-muted mb-0">Gestione e monitoraggio delle nazioni nel sistema</p>
        </div>
        <a href="{{route('admin.countries.create')}}" class="btn btn-primary px-4 py-2">
            <i class="bi bi-plus-lg me-2"></i>Nuovo Paese
        </a>
    </div>
    @if(count($countries) > 0)
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold text-secondary">Paese</th>
                            <th class="py-3 text-uppercase small fw-bold text-secondary">Continente</th>
                            <th class="py-3 text-uppercase small fw-bold text-secondary text-center">Destinazioni Associate</th>
                            <th class="pe-4 py-3 text-uppercase small fw-bold text-secondary text-end">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                        <tr>
                            <td class="ps-4">
                                <span class="fw-bold fs-5 text-dark">{{$country->name}}</span>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary px-3 py-2 border border-primary border-opacity-25">
                                    {{$country->continent}}
                                </span>
                            </td>
                            <td class="text-center">
                                @if($country->destinations_count > 0)
                                <span class="badge bg-primary rounded-pill px-3">
                                    {{ $country->destinations_count }}
                                </span>
                                @else
                                <span class="badge rounded-pill bg-light text-secondary border fw-normal">
                                    <i class="bi bi-dash-circle me-1"></i> Nessuna descrizione
                                </span>
                                @endif
                            </td>
                            <td class="pe-4 text-end">
                                <div class="btn-group shadow-sm" role="group">
                                    <a href="{{route('admin.countries.show', $country)}}" class="btn btn-outline-info btn-sm px-3">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{route('admin.countries.edit', $country)}}" class="btn btn-outline-warning btn-sm px-3">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-outline-danger btn-sm px-3" data-bs-toggle="modal" data-bs-target="#{{$country->id}}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                            <!-- Modal -->
                            <div class="modal fade" id="{{$country->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
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
                                                    <p class="mb-1 fw-bold text-dark">Stai per eliminare il paese: <span class="text-danger">"{{ $country->name }}"</span></p>
                                                    <p class="mb-0 text-muted small">
                                                        L'azione è irreversibile. Tutte le destinazioni e i dati associati a questa nazione verranno rimossi permanentemente dal database.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0 pt-0">
                                            <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Annulla</button>

                                            <form action="{{ route('admin.countries.destroy', $country) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger px-4 shadow-sm fw-bold">
                                                    Sì, elimina definitivamente
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end Modal -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @else
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body py-5">
            <div class="text-center">
                <div class="display-1 text-muted opacity-25 mb-3">
                    <i class="bi bi-globe-central-south-asia"></i>
                </div>
                <h4 class="fw-bold text-secondary">Nessun paese trovato</h4>
                <p class="text-muted mx-auto" style="max-width: 400px;">
                    Sembra che non ci siano ancora nazioni registrate nel sistema.
                    Inizia aggiungendo il primo paese per popolare il catalogo.
                </p>
                <a href="#" class="btn btn-primary mt-3 px-4">
                    <i class="bi bi-plus-lg me-2"></i>Aggiungi il primo Paese
                </a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
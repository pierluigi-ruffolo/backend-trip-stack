@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0 text-dark">Gestione Paesi</h2>
            <p class="text-muted">Monitora le nazioni e le relative destinazioni associate</p>
        </div>
        <a href="{{route('admin.countries.create')}}" class="btn btn-primary px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Nuovo Paese
        </a>
    </div>

    @if(count($countries) > 0)
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary small text-uppercase">
                        <tr>
                            <th class="ps-4 py-3">Paese</th>
                            <th class="py-3">Continente</th>
                            <th class="py-3 text-center">Destinazioni</th>
                            <th class="pe-4 py-3 text-end">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($countries as $country)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-primary bg-opacity-10 d-flex align-items-center justify-content-center border shadow-sm me-3" style="width: 45px; height: 45px;">
                                        <i class="bi bi-globe-americas text-primary"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{$country->name}}</div>
                                        <div class="small text-muted text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">ID: #{{$country->id}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-info-subtle text-info fw-medium px-3 py-2">
                                    {{$country->continent}}
                                </span>
                            </td>
                            <td class="text-center">
                                @if($country->destinations_count > 0)
                                <span class="badge bg-primary rounded-pill px-3">
                                    {{ $country->destinations_count }}
                                </span>
                                @else
                                <span class="text-muted small italic">Nessuna</span>
                                @endif
                            </td>
                            <td class="pe-4 text-end">
                                <div class="btn-group shadow-sm border rounded bg-white">
                                    <a href="{{route('admin.countries.show', $country)}}" class="btn btn-white btn-sm px-3" title="Vedi">
                                        <i class="bi bi-eye text-primary"></i>
                                    </a>
                                    <a href="{{route('admin.countries.edit', $country)}}" class="btn btn-white btn-sm px-3 border-start border-end" title="Modifica">
                                        <i class="bi bi-pencil text-warning"></i>
                                    </a>
                                    <button type="button" class="btn btn-white btn-sm px-3 text-danger" title="Elimina" data-bs-toggle="modal" data-bs-target="#modal-{{$country->id}}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="modal-{{$country->id}}" data-bs-backdrop="static" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-danger bg-opacity-10 border-bottom-0 pb-0">
                                        <h5 class="modal-title fw-bold text-danger">
                                            <i class="bi bi-exclamation-triangle-fill me-2"></i>Conferma Eliminazione
                                        </h5>
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        <p class="mb-1 fw-bold text-dark">Stai per eliminare: <span class="text-danger">"{{ $country->name }}"</span></p>
                                        <p class="mb-0 text-muted small">
                                            Attenzione: tutte le destinazioni associate verranno rimosse permanentemente.
                                        </p>
                                    </div>
                                    <div class="modal-footer border-top-0 pt-0">
                                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('admin.countries.destroy', $country) }}" method="POST">
                                            @csrf @method('DELETE')
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
    @else
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body py-5 text-center">
            <div class="display-1 text-muted opacity-25 mb-3">
                <i class="bi bi-globe-central-south-asia"></i>
            </div>
            <h4 class="fw-bold text-secondary">Nessun paese trovato</h4>
            <a href="{{route('admin.countries.create')}}" class="btn btn-primary mt-3 px-4">
                <i class="bi bi-plus-lg me-2"></i>Aggiungi il primo Paese
            </a>
        </div>
    </div>
    @endif
</div>
@endsection
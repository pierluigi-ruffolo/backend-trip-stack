@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.tags.index') }}" class="btn btn-link text-secondary p-0 text-decoration-none">
            <i class="bi bi-arrow-left me-1"></i> Torna alla lista
        </a>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-outline-warning px-4 shadow-sm fw-bold">
                <i class="bi bi-pencil me-2"></i> Modifica
            </a>
            <button type="button" class="btn btn-outline-danger px-4 shadow-sm fw-bold" data-bs-toggle="modal" data-bs-target="#modal-delete">
                <i class="bi bi-trash me-2"></i> Elimina
            </button>
        </div>
    </div>
    <div class="card border-0 shadow-sm mb-5 overflow-hidden">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-md-2 d-flex align-items-center justify-content-center text-white py-4 shadow-inset"
                    style="background-color: {{ $tag->color }};">
                    <i class="bi bi-tag-fill" style="font-size: 4rem;"></i>
                </div>
                <div class="col-md-10 p-4">
                    <div class="d-flex align-items-center mb-2">
                        <h1 class="fw-bold mb-0 me-3">{{ $tag->name }}</h1>
                        <span class="badge rounded-pill border px-3 py-2"
                            style="background-color: {{ $tag->color }}15; color: {{ $tag->color }}; border-color: {{ $tag->color }}40 !important;">
                            {{ strtoupper($tag->color) }}
                        </span>
                    </div>
                    <div class="text-muted">
                        <h6 class="text-uppercase small fw-bold text-secondary mb-2">Informazioni Tag</h6>
                        <p class="mb-0 italic">
                            Questo tag viene utilizzato per categorizzare le destinazioni come <strong>{{ $tag->name }}</strong>.
                            Attualmente è associato a {{ $tag->destinations->count() }} mete.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Destinazioni con questo Tag</h3>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($tag->destinations as $destination)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm card-hover overflow-hidden">
                <div style="height: 180px; position: relative;">
                    <img src="{{ $destination->cover_image ? asset('storage/' . $destination->cover_image) : asset('img/default-placeholder.png') }}"
                        class="w-100 h-100 object-fit-cover" alt="{{ $destination->title }}">
                    <div class="position-absolute top-0 end-0 p-2">
                        <span class="badge bg-dark bg-opacity-75">€{{ $destination->price_person }}</span>
                    </div>
                </div>
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-2">{{ $destination->title }}</h5>
                    <p class="text-muted small mb-3 text-truncate">{{ $destination->description }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                        <div class="text-muted small">
                            <i class="bi bi-geo-alt me-1"></i> {{ $destination->country->name }}
                        </div>
                        <a href="{{ route('admin.destinations.show', $destination) }}" class="btn btn-sm btn-light">
                            Dettagli <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="bg-light rounded-4 py-5 text-center border border-dashed">
                <i class="bi bi-tags display-4 text-muted opacity-50 mb-3"></i>
                <p class="text-muted mb-0">Non ci sono ancora destinazioni associate a questo tag.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
<div class="modal fade" id="modal-delete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-danger bg-opacity-10 border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold text-danger">
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
                        <p class="mb-1 fw-bold text-dark">Stai per eliminare il tag: <span class="text-danger">"{{ $tag->name }}"</span></p>
                        <p class="mb-0 text-muted small">
                            L'azione scollegherà questo tag da tutte le destinazioni. Le destinazioni non verranno eliminate, ma non avranno più questa etichetta.
                        </p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top-0 pt-0">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Annulla</button>
                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4 shadow-sm fw-bold">
                        Sì, elimina tag
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
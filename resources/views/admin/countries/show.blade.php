@extends('layouts.app')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{route('admin.countries.index')}}" class="btn btn-link text-secondary p-0 text-decoration-none">
            <i class="bi bi-arrow-left me-1"></i> Torna alla lista
        </a>
        <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-warning">
                <i class="bi bi-pencil me-1"></i> Modifica
            </a>
            <a href="#" class="btn btn-outline-danger">
                <i class="bi bi-trash me-1"></i> Elimina
            </a>
        </div>
    </div>
    <div class="card border-0 shadow-sm mb-5 overflow-hidden">
        <div class="card-body p-0">
            <div class="row g-0">
                <div class="col-md-2 bg-primary d-flex align-items-center justify-content-center text-white py-4">
                    <i class="bi bi-globe-europe-africa" style="font-size: 4rem;"></i>
                </div>
                <div class="col-md-10 p-4">
                    <div class="d-flex align-items-center mb-2">
                        <h1 class="fw-bold mb-0 me-3">{{$country->name}}</h1>
                        <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3">
                            {{ $country->continent}}
                        </span>
                    </div>
                    <div class="text-muted">
                        <h6 class="text-uppercase small fw-bold text-secondary mb-2">Informazioni sul Paese</h6>
                        <p class="mb-0 italic">
                            {{ $country->description ?? 'Nessuna descrizione disponibile per questo paese.' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">Destinazioni Associate</h3>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @forelse ($country->destinations as $destination)
        <div class="col">
            <div class="card h-100 border-0 shadow-sm card-hover">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <span class="fw-bold text-primary">€{{$destination->price_person}}</span>
                    </div>
                    <h5 class="fw-bold mb-2">{{$destination->title}}</h5>
                    <p class="text-muted small mb-4">{{$destination->description}}</p>
                    <div class="d-flex justify-content-between align-items-center mt-auto pt-3 border-top">
                        <div class="text-muted small">
                            <i class="bi bi-calendar3 me-1"></i> {{ $destination->created_at->diffForHumans() }}
                        </div>
                        <a href="#" class="btn btn-sm btn-light">
                            Dettagli <i class="bi bi-chevron-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="bg-light rounded-4 py-5 text-center border border-dashed">
                <i class="bi bi-pin-map display-4 text-muted opacity-50 mb-3"></i>
                <p class="text-muted mb-0">Non ci sono ancora destinazioni associate a questo paese.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
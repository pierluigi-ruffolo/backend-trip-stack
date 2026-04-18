@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h1 class="fw-bold text-dark mb-1">{{$destination->title}}</h1>
            <p class="text-muted">Slug: <span class="badge bg-light text-secondary border">{{$destination->slug}}</span></p>
        </div>
        <div class="d-flex gap-2">
            <a href="#" class="btn btn-outline-warning px-4 shadow-sm fw-bold">
                <i class="bi bi-pencil me-2"></i>Modifica
            </a>
            <button class="btn btn-outline-danger px-4 shadow-sm fw-bold">
                <i class="bi bi-trash me-2"></i>Elimina
            </button>
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-12">
            <div class="rounded-4 overflow-hidden shadow-sm position-relative" style="height: 400px;">
                <img src="{{asset('img/default-placeholder.png')}}" alt="Cover Banner" class="w-100 h-100 object-fit-cover">
                <div class="position-absolute bottom-0 start-0 p-4 w-100 bg-gradient-dark">
                    <div class="d-flex gap-2">
                        @forelse ($destination->tags as $tag)
                        <span style="background-color: {{ $tag->color }}" class="badge px-3 py-2 shadow">{{$tag->name}}</span>
                        @empty
                        <small class="text-muted italic">
                            <i class="bi bi-info-circle me-1"></i> Non sono stati inseriti tag per questa destinazione
                        </small>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-5">
        <div class="col-lg-8">
            <section class="mb-5">
                @if($destination->description)
                <h4 class="fw-bold mb-4 border-bottom pb-2">Descrizione Completa</h4>
                <div class="text-muted lh-lg fs-5">
                    {{$destination->description}}
                </div>
                @else
                <h4 class="fw-bold mb-4 border-bottom pb-2 text-secondary opacity-50">Descrizione</h4>
                <div class="border rounded-4 p-5 bg-light text-center">
                    <i class="bi bi-card-text fs-1 text-muted opacity-25 d-block mb-3"></i>
                    <p class="text-muted italic mb-0">Nessun dettaglio testuale disponibile per questa destinazione.</p>
                </div>
                @endif
            </section>
            <section>
                <h4 class="fw-bold mb-4 border-bottom pb-2">Informazioni Geografiche</h4>
                <div class="card border-0 bg-light p-4 rounded-4 shadow-sm">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-white shadow-sm d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-geo-alt-fill text-primary fs-3"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">{{$destination->country->name}}</h5>
                            <p class="text-muted mb-2 small">Continente: {{$destination->country->continent}}</p>
                            <a href="{{route('admin.countries.show', $destination->country)}}" class="btn btn-sm btn-link text-primary p-0 fw-bold text-decoration-none">
                                <i class="bi bi-arrow-right-circle me-1"></i>Vai alla scheda del Paese
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 2rem;">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                    <div class="card-header bg-dark py-3">
                        <h5 class="text-white mb-0 text-center fw-bold">Scheda Tecnica</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-4 text-center">
                            <span class="text-muted small text-uppercase d-block mb-1">Prezzo a Persona</span>
                            <h2 class="text-success fw-bold mb-0"> € {{$destination->price_person ?? "N/D"}}</h2>
                        </div>

                        <hr class="opacity-25">

                        <div class="py-3 d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                                <i class="bi bi-calendar-event text-primary fs-4"></i>
                            </div>
                            <div>
                                <span class="text-muted small d-block text-uppercase fw-semibold tracking-wider">Durata Viaggio</span>
                                @if($destination->duration)
                                <span class="fw-bold fs-5 text-dark">
                                    {{ $destination->duration }} {{ $destination->duration == 1 ? 'Giorno' : 'Giorni' }}
                                </span>
                                @else
                                <span class="text-muted fs-6 italic">
                                    <i class="bi bi-clock-history me-1"></i> Da definire
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
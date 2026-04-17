@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex align-items-center mb-5">
        <div class="bg-white shadow-sm rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
            <i class="bi bi-person-badge text-primary fs-2"></i>
        </div>
        <div>
            <h2 class="fs-4 fw-bold text-dark mb-0">Bentornato, {{ Auth::user()->name }}!</h2>
            <p class="text-secondary mb-0 small">Ecco cosa sta succedendo nel tuo portale di viaggi oggi.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body border-start border-primary border-5 rounded-start">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted small fw-bold">Destinazioni</h6>
                            <h2 class="fw-bold mb-0">{{ $CountDestinations }}</h2>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded text-primary">
                            <i class="bi bi-map fs-1"></i>
                        </div>
                    </div>
                    <hr class="text-muted opacity-25">
                    <a href="#" class="text-decoration-none small text-primary fw-semibold">
                        Gestisci elenco <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body border-start border-success border-5 rounded-start">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted small fw-bold">Paesi</h6>
                            <h2 class="fw-bold mb-0">{{ $CountCountries }}</h2>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded text-success">
                            <i class="bi bi-globe-americas fs-1"></i>
                        </div>
                    </div>
                    <hr class="text-muted opacity-25">
                    <a href="{{route('admin.countries.index')}}" class="text-decoration-none small text-success fw-semibold">
                        Vedi nazioni <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body border-start border-warning border-5 rounded-start">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-uppercase text-muted small fw-bold">Tag</h6>
                            <h2 class="fw-bold mb-0">{{ $CountTags }}</h2>
                        </div>
                        <div class="bg-warning bg-opacity-10 p-3 rounded text-warning">
                            <i class="bi bi-tags fs-1"></i>
                        </div>
                    </div>
                    <hr class="text-muted opacity-25">
                    <a href="#" class="text-decoration-none small text-warning fw-semibold">
                        Organizza tag <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-header bg-white border-0 py-3">
            <h5 class="fw-bold mb-0">
                <i class="bi bi-clock-history me-2 text-primary"></i>Ultime Destinazioni Aggiunte
            </h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Titolo</th>
                            <th>Paese</th>
                            <th>Prezzo</th>
                            <th class="text-end pe-4">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentDestinations as $destination)
                        <tr>
                            <td class="ps-4">
                                <span class="fw-semibold text-dark">{{ $destination->title }}</span>
                            </td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info px-3">
                                    {{ $destination->country->name }}
                                </span>
                            </td>
                            <td>{{ $destination->price_person ? '€' . number_format($destination->price_person, 2, ',', '.') : '€ -' }}</td>
                            <td class="text-end pe-4">
                                <a href="#" class="btn btn-sm btn-light">
                                    <i class="bi bi-eye"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body">
            <h2 class="fw-bold mb-3 text-uppercase small fw-bold">
                <i class="bi bi-fire me-2 text-danger"></i>Tag più popolari
            </h2>
            <div class="d-flex flex-wrap gap-2">
                @foreach($popularTags as $tag)
                <span class="badge rounded-pill d-flex align-items-center p-2 px-3 fs-5"
                    style="background-color: {{ $tag->color }}15; color: {{ $tag->color }}; border: 1px solid {{ $tag->color }}40;">
                    <i class="bi bi-tag-fill me-2"></i>
                    {{ $tag->name }}
                    <span class="ms-2">({{ $tag->destinations_count }})</span>
                </span>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm bg-dark text-white p-4">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8">
                        <h5 class="fw-bold">Pronto per una nuova avventura?</h5>
                        <p class="text-light opacity-75 mb-md-0">Aggiungi subito una nuova destinazione o un nuovo paese per aggiornare il tuo catalogo.</p>
                    </div>
                    <div class="col-12 col-lg-4 text-md-end">
                        <a href="#" class="btn btn-primary me-2">
                            <i class="bi bi-plus-circle me-1"></i> Destinazione
                        </a>
                        <a href="#" class="btn btn-outline-light">
                            <i class="bi bi-plus-circle me-1"></i> Paese
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-dark mb-1">Modifica Destinazione</h1>
            <p class="text-muted">Inserisci i dettagli per Modificare una meta turistica</p>
        </div>
        <a href="{{route('admin.destinations.index')}}" class="btn btn-outline-secondary px-3 shadow-sm">
            <i class="bi bi-arrow-left me-2"></i>Annulla
        </a>
    </div>
    <form action="{{route('admin.destinations.update', $destination)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm p-4 mb-4">
                    <h5 class="fw-bold mb-4 border-bottom pb-2">Informazioni Principali</h5>
                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Titolo Destinazione</label>
                        <input value="{{$destination->title}}" name="title" type="text" id="title" class="form-control form-control-lg" placeholder="Es: Tramonto a Santorini">
                        <p class="pt-1 text-danger">
                            @error('title')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label text-muted small">Slug (URL amichevole)</label>
                        <input type="text" id="slug" class="form-control form-control-sm bg-light" placeholder="{{$destination->slug}}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label fw-bold">Descrizione Completa</label>
                        <textarea name="description" id="description" class="form-control" rows="8" placeholder="Descrivi l'esperienza, l'itinerario e cosa è incluso...">{{$destination->description}}</textarea>
                    </div>
                </div>
                <div class="card border-0 shadow-sm p-4">
                    <h5 class="fw-bold mb-4 border-bottom pb-2">Media</h5>
                    <div class="mb-3">
                        <label for="cover_image" class="form-label fw-bold">Immagine di Copertina</label>
                        <input name="cover_image" type="file" id="cover_image" class="form-control">
                        @if($destination->cover_image)
                        <img class="mt-2 img-fluid w-50 h-50 object-fit-cover" src="{{asset('storage/' . $destination->cover_image)}}" alt="">
                        @else
                        <div class="form-text">Carica un'immagine di alta qualità (consigliato 1200x400px).</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm p-4 mb-4">
                    <h5 class="fw-bold mb-4 border-bottom pb-2">Dettagli Tecnici</h5>
                    <div class="mb-3">
                        <label for="price" class="form-label fw-bold">Prezzo a persona (€)</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white">€</span>
                            <input value="{{$destination->price_person}}" name="price_person" type="number" id="price" class="form-control" placeholder="0.00" step="0.01">
                        </div>
                        <p class="mt-1 text-danger">
                            @error('price_person')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label fw-bold">Durata (Giorni)</label>
                        <div class="input-group">
                            <input value="{{$destination->duration}}" name="duration" type="number" id="duration" class="form-control" placeholder="Es: 7">
                            <span class="input-group-text bg-white">Giorni</span>
                        </div>
                    </div>
                    <hr class="my-4 opacity-25">
                    <div class="mb-3">
                        <label for="country" class="form-label fw-bold">Paese di appartenenza</label>
                        <select name="country_id" id="country" class="form-select">
                            <option selected disabled>Seleziona un Paese</option>
                            @foreach($countries as $country)
                            <option {{$country->id === $destination->country_id ? "selected" : ""}} value="{{$country->id}}">{{$country->name}}</option>
                            @endforeach
                        </select>
                        <p class="pt-1 text-danger">
                            @error('country_id')
                            {{$message}}
                            @enderror
                        </p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block mb-3">Tag / Categorie</label>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($tags as $tag)
                            <input name="tags[]"
                                value="{{$tag->id}}" type="checkbox" class="btn-check" id="tag{{$tag->id}}" autocomplete="off"
                                {{ $destination->tags->contains($tag->id) ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary rounded-pill px-3 py-1 fw-medium" for="tag{{$tag->id}}">
                                <i class="bi bi-plus-lg me-1 small"></i> {{$tag->name}}
                            </label>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center gap-3">
                    <button type="submit" class="btn btn-warning px-5 py-2 fw-bold shadow-sm">
                        <i class="bi bi-check2-all me-2"></i>Aggiorna Destinazione
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
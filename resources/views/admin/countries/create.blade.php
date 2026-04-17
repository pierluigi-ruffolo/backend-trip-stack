@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8 offset-md-2">
            <a href="{{route('admin.countries.index')}}" class="btn btn-link text-secondary p-0 text-decoration-none mb-3">
                <i class="bi bi-arrow-left me-1"></i> Torna alla lista
            </a>
            <h2 class="fw-bold text-dark">Crea Nuovo Paese</h2>
            <p class="text-muted">Inserisci le informazioni di base per registrare una nuova nazione nel sistema.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form action="{{route('admin.countries.store')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-7 mb-4">
                                <label for="name" class="form-label fw-bold text-secondary">Nome del Paese</label>
                                <input type="text" class="form-control form-control-lg border-2 shadow-none"
                                    value="{{ old('name') }}" name="name" id="name" placeholder="Es: Italia, Giappone, Islanda..." required>
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-5 mb-4">
                                <label for="continent" class="form-label fw-bold text-secondary">Continente</label>
                                <select name="continent" class="form-select form-select-lg border-2 shadow-none" id="continent">
                                    <option selected disabled>Scegli...</option>
                                    @foreach($continents as $continent)
                                    <option value="{{$continent}}">{{$continent}}</option>
                                    @endforeach
                                </select>
                                @error('continent')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold text-secondary">Descrizione (Opzionale)</label>
                            <textarea name="description" class="form-control border-2 shadow-none" id="description" rows="5"
                                placeholder="Scrivi una breve introduzione al paese..."></textarea>
                            <div class="form-text">Questa descrizione verrà mostrata nella pagina di dettaglio del paese.</div>
                        </div>
                        <hr class="my-5 opacity-25">
                        <div class="d-flex justify-content-end align-items-center gap-3">
                            <button type="submit" class="btn btn-primary px-5 py-2 fw-bold shadow-sm">
                                <i class="bi bi-cloud-arrow-up me-2"></i>Salva Paese
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
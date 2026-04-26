@extends('layouts.app')
@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold text-dark mb-1">Modifica Tag</h1>
            <p class="text-muted">Aggiorna il nome o il colore identificativo di questa categoria.</p>
        </div>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-secondary px-3 shadow-sm">
            <i class="bi bi-arrow-left me-2"></i>Annulla
        </a>
    </div>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">
            <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-8 mb-4">
                        <label for="name" class="form-label fw-bold">Nome del Tag</label>
                        <input type="text"
                            class="form-control form-control-lg border-2 shadow-none @error('name') is-invalid @enderror"
                            value="{{ old('name', $tag->name) }}"
                            name="name"
                            id="name"
                            placeholder="Es: Avventura, Relax..."
                            required>
                        @error('name')
                        <div class="text-danger mt-1 small fw-bold">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="color" class="form-label fw-bold">Colore Identificativo</label>
                        <input type="color"
                            class="form-control form-control-lg border-2 shadow-none p-1"
                            name="color"
                            id="color"
                            value="{{ old('color', $tag->color) }}"
                            title="Scegli un colore"
                            style="height: 48px;">
                        <div class="form-text">Il colore attuale è: <span class="fw-bold">{{ strtoupper($tag->color) }}</span></div>
                        @error('color')
                        <div class="text-danger mt-1 small fw-bold">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <hr class="my-5 opacity-25">
                <div class="d-flex justify-content-end align-items-center gap-3">
                    <button type="submit" class="btn btn-warning px-5 py-2 fw-bold shadow-sm">
                        <i class="bi bi-check2-all me-2"></i>Aggiorna Tag
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
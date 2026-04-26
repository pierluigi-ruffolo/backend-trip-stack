@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-0 text-dark">Gestione Tag</h2>
            <p class="text-muted">Organizza le categorie e le etichette per le tue destinazioni</p>
        </div>
        <a href="{{route('admin.tags.create')}}" class="btn btn-primary px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Nuovo Tag
        </a>
    </div>
    @if(count($tags) > 0)
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary small text-uppercase">
                        <tr>
                            <th class="ps-4 py-3">Tag</th>
                            <th class="py-3">Colore Anteprima</th>
                            <th class="py-3 text-center">Utilizzo</th>
                            <th class="pe-4 py-3 text-end">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    {{-- Icona dinamica con il colore del tag --}}
                                    <div class="rounded-circle d-flex align-items-center justify-content-center border shadow-sm me-3"
                                        style="width: 45px; height: 45px; background-color: {{ $tag->color }}20; border-color: {{ $tag->color }} !important;">
                                        <i class="bi bi-tag-fill" style="color: {{ $tag->color }};"></i>
                                    </div>
                                    <div>
                                        <div class="fw-bold text-dark">{{$tag->name}}</div>
                                        <div class="small text-muted text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">ID: #{{$tag->id}}</div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="badge border text-dark fw-medium px-3 py-2 d-flex align-items-center" style="background-color: white;">
                                        <span class="rounded-circle me-2" style="width: 12px; height: 12px; background-color: {{ $tag->color }}; display: inline-block;"></span>
                                        {{ strtoupper($tag->color) }}
                                    </span>
                                </div>
                            </td>
                            <td class="text-center">
                                @if(isset($tag->destinations_count))
                                <span class="badge bg-secondary rounded-pill px-3">
                                    {{ $tag->destinations_count }}
                                </span>
                                @else
                                <span class="text-muted small">N/D</span>
                                @endif
                            </td>
                            <td class="pe-4 text-end">
                                <div class="btn-group shadow-sm border rounded bg-white">
                                    <a href="{{route('admin.tags.show', $tag)}}" class="btn btn-white btn-sm px-3" title="Vedi">
                                        <i class="bi bi-eye text-primary"></i>
                                    </a>
                                    <a href="{{route('admin.tags.edit', $tag)}}" class="btn btn-white btn-sm px-3 border-start border-end" title="Modifica">
                                        <i class="bi bi-pencil text-warning"></i>
                                    </a>
                                    <button type="button" class="btn btn-white btn-sm px-3 text-danger" title="Elimina" data-bs-toggle="modal" data-bs-target="#modal-{{$tag->id}}">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        {{-- Modal Eliminazione Tag --}}
                        <div class="modal fade" id="modal-{{$tag->id}}" data-bs-backdrop="static" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-danger bg-opacity-10 border-bottom-0 pb-0">
                                        <h5 class="modal-title fw-bold text-danger">
                                            <i class="bi bi-exclamation-triangle-fill me-2"></i>Conferma Eliminazione
                                        </h5>
                                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body py-4">
                                        <p class="mb-1 fw-bold text-dark">Stai per eliminare il tag: <span class="text-danger">"{{ $tag->name }}"</span></p>
                                        <p class="mb-0 text-muted small">
                                            L'eliminazione del tag lo rimuoverà da tutte le destinazioni associate, ma non cancellerà le destinazioni stesse.
                                        </p>
                                    </div>
                                    <div class="modal-footer border-top-0 pt-0">
                                        <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
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
                <i class="bi bi-tags"></i>
            </div>
            <h4 class="fw-bold text-secondary">Nessun tag trovato</h4>
            <a href="{{route('admin.tags.create')}}" class="btn btn-primary mt-3 px-4">
                <i class="bi bi-plus-lg me-2"></i>Crea il tuo primo Tag
            </a>
        </div>
    </div>
    @endif
</div>
@endsection
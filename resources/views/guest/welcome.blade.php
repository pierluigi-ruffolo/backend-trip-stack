@extends('layouts.guest')


@section('content')
<div class="container pt-5">
    <div class="row align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0 text-center text-lg-start">
            <h1 class="display-4 fw-bold mb-4" style="color: #075985; line-height: 1.2;">
                Gestisci le tue <br>avventure con precisione.
            </h1>
            <p class="lead text-muted mb-4">
                TripStack è la soluzione avanzata per l'organizzazione di database turistici.
                Pianifica, cataloga e amministra destinazioni internazionali in un'unica interfaccia sicura.
            </p>
            <div class="d-flex justify-content-center justify-content-lg-start gap-3">
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">
                    Accedi al Pannello
                </a>
                <a href="{{ route('register') }}" class="btn btn-outline-dark btn-lg rounded-pill px-5">
                    Registrati
                </a>
            </div>
        </div>
        <div class="col-lg-6 text-center">
            <div class="position-relative">
                <div class="p-5 bg-white shadow-lg rounded-4 border border-light">
                    <i class="bi bi-display text-primary" style="font-size: 8rem;"></i>
                    <h4 class="mt-3 fw-bold">Admin Console</h4>
                    <p class="small text-muted">Versione 1.0.2 - 2026</p>
                </div>
                <div class="position-absolute top-50 start-50 translate-middle bg-primary opacity-10 rounded-circle" style="width: 300px; height: 300px; z-index: -1;"></div>
            </div>
        </div>

    </div>

    <div class="row mt-5 border-top pt-5 g-4 text-center">
        <div class="col-md-4">
            <h5 class="fw-bold"><i class="bi bi-shield-lock me-2"></i> Sicuro</h5>
            <p class="small text-muted">Accesso protetto per la gestione dei dati sensibili e delle configurazioni.</p>
        </div>
        <div class="col-md-4">
            <h5 class="fw-bold"><i class="bi bi-lightning-charge me-2"></i> Veloce</h5>
            <p class="small text-muted">Interfaccia ottimizzata per il caricamento rapido di record e asset multimediali.</p>
        </div>
        <div class="col-md-4">
            <h5 class="fw-bold"><i class="bi bi-cloud-check me-2"></i> Cloud-Native</h5>
            <p class="small text-muted">Dati sempre sincronizzati e accessibili da qualsiasi postazione lavorativa.</p>
        </div>
    </div>
</div>
@endsection
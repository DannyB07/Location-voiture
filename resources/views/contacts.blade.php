@extends('layouts.master')

@section('title', 'Contacts')

@section('main')
<div class="container-fluid bg-dark text-light py-5" style="min-height: 100vh; background-color: #262627;">
    <div class="row">
        <!-- Image principale de l'agence -->
        <div class="col-12 text-center">
            <img src="{{ asset('img-agence/terer.png') }}" alt="Agence Image" class="img-fluid mb-4" style="max-width: 300px; height: auto;">
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Titre principal -->
            <div class="col-12 text-center mb-5">
                <h1 class="display-4 text-bright">Contactez-nous ici</h1> <!-- Titre lumineux -->
            </div>
        </div>

        <div class="row justify-content-center">
            @foreach ($agences as $agence)
            <!-- Section d'informations de l'agence -->
            <div class="col-12 col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                <div class="p-4 bg-secondary rounded w-100">
                    <h3 class="text-bright mb-3">{{ $agence->nom_entreprise }}</h3> <!-- Sous-titre lumineux -->
                    <p class="text-bright"><strong>Email:</strong> {{ $agence->email }}</p>
                    <p class="text-bright"><strong>Téléphone:</strong> {{ $agence->phone }}</p>
                    <p class="text-bright"><strong>Adresse:</strong> {{ $agence->adresse }}</p>
                    <p class="text-bright"><strong>Site Web:</strong> <a href="{{ $agence->site_web }}" target="_blank" class="text-light">{{ $agence->site_web }}</a></p>
                    <p class="text-bright"><strong>Facebook:</strong> <a href="{{ $agence->facebook }}" target="_blank" class="text-light">{{ $agence->facebook }}</a></p>
                    <p class="text-bright"><strong>Instagram:</strong> <a href="{{ $agence->instagram }}" target="_blank" class="text-light">{{ $agence->instagram }}</a></p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $agences->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

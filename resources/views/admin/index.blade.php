@extends('admin.layouts.master')

@section('title', 'Accueil')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Accueil</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Accueil</li>
        </ol>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-light text-white mb-4">
                    <div class="card-body text-dark">Nombre de voitures</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-dark fs-4" href="#">Indisponible</p>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-light text-white mb-4">
                    <div class="card-body text-dark">Nombre d'utilisateurs</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-dark fs-4" href="#">Indisponible</p>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-light text-white mb-4">
                    <div class="card-body text-dark">Nombre de locations en cours</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-dark fs-4" href="#">Indisponible</p>
                        <div class="small"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <!-- Carte pour le nombre d'avis approuvés -->
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Nombre d'avis approuvés</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white fs-4">{{ isset($approvedCount) ? $approvedCount : 0 }}</p>
                        <div class="small"><i class="fas fa-check"></i></div>
                    </div>
                </div>
            </div>
            <!-- Carte pour le nombre d'avis rejetés -->
            <div class="col-xl-4 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Nombre d'avis rejetés</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <p class="text-white fs-4">{{ isset($rejectedCount) ? $rejectedCount : 0 }}</p>
                        <div class="small"><i class="fas fa-times"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

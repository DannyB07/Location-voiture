@extends('admin.layouts.master')

@section('title', "Créer une voiture")

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Créer une voiture</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Voitures</a></li>
            <li class="breadcrumb-item active">Nouvelle</li>
        </ol>
        <!-- <div class="card mb-4">
            <div class="card-body">
                Ici vous pouvez voir toute les voitures de notre parking.
            </div>
        </div>-->
        <div class="mb-4">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <div>
                    {{ $error }}
                </div>
            </div>
            @endforeach
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="last_name" class="col-sm-3 my-2 col-form-label">Nom de famille :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="last_name" name="last_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-sm-3 my-2 col-form-label">Prénoms :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="first_name" name="first_name" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 my-2 col-form-label">Numéro de téléphone :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="date_of_birth" class="col-sm-3 my-2 col-form-label">Date de naissance :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 my-2 col-form-label">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-sm-3 my-2 col-form-label">Mot de passe :</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>

                        <div class="form-group row my-4">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Créer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@extends('admin.layouts.master')

@section('title', "Créer une agence")

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Créer une agence</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.agences.index') }}">Agences</a></li>
            <li class="breadcrumb-item active">Nouvelle</li>
        </ol>

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
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.agences.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="nom_entreprise" class="col-sm-3 my-2 col-form-label">Nom de l'entreprise :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nom_entreprise" name="nom_entreprise" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nom_proprietaire" class="col-sm-3 my-2 col-form-label">Nom du propriétaire :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nom_entreprise" name="nom_proprietaire" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="adresse" class="col-sm-3 my-2 col-form-label"> Adresse :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="adresse" name="adresse" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 my-2 col-form-label"> Numéro de téléphone :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 my-2 col-form-label"> Email :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="site_web" class="col-sm-3 my-2 col-form-label"> Site Web :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="site_web" name="site_web" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="facebook" class="col-sm-3 my-2 col-form-label"> Compte Facebook :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="facebook" name="facebook" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="instagram" class="col-sm-3 my-2 col-form-label"> Compte Instagram :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="instagram" name="instagram" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-3 my-2 col-form-label"> Description :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo" class="col-sm-3 my-2 col-form-label"> Logo de l'entreprise :</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
                            </div>
                        </div>


                        <div class="form-group row my-4">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary">Créer</button>
                                <button type="button" class="btn btn-secondary" onclick="window.history.back()" >Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

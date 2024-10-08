@extends('admin.layouts.master')

@section('title', "Créer une promotion")

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Créer une promotion</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.promotions.index') }}">Promotions</a></li>
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
                    <form action="{{ route('admin.promotions.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="code" class="col-sm-3 my-2 col-form-label">Code de promotion :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="code" name="code" required>
                            </div>
                        </div>
                        <div class="form-group row my-4">
                            <label for="montant_reduction" class="col-sm-3 my-2 col-form-label"> Montant de la remise :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="montant_reduction" name="montant_reduction" required>
                            </div>
                        </div>
                        <div class="form-group row my-4">
                            <label for="date_limite" class="col-sm-3 my-2 col-form-label">Date limite :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="date_limite" name="date_limite" required>
                            </div>
                        </div>
                        <div class="form-group row my-4">
                            <label for="car_id" class="col-sm-3 my-2 col-form-label">Véhicule :</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="car_id" name="car_id" required>
                                    <option value="">--- Choisir ---</option>
                                    @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->brand }} - {{ $car->model }}</option>
                                @endforeach
                                </select>
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

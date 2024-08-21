@extends('admin.layouts.master')

@section('title', "Modifier {{ $car->model.' '.$car->marque->name }}")

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Modifier informations sur la voiture</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.car.index') }}">Voitures</a></li>
            <li class="breadcrumb-item active">{{ $car->model }}</li>
        </ol>
        <!-- <div class="card mb-4">
            <div class="card-body">
                Ici vous pouvez voir toute les voitures de notre parking.
            </div>
        </div>-->
        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.car.update', ['id' => $car->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="model" class="col-sm-3 my-2 col-form-label">Modèle :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="model" name="model" value="{{ $car->model }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="brand" class="col-sm-3 my-2 col-form-label">Marque :</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="brand" name="brand" required>
                                @foreach($marques as $marque)
                                <option value="{{ $marque->name }}" {{ (isset($car) && $car->brand == $marque->name) ? 'selected' : '' }}>
                                    {{ $marque->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-sm-3 my-2 col-form-label">Année de fabrication :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="year" name="make_year" min="1900" max="{{ date('Y') }}" value="{{ $car->make_year }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="seats" class="col-sm-3 my-2 col-form-label">Nombre de sièges :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="seats" name="passenger_capacity" min="1" max="50" value="{{ $car->passenger_capacity }}"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="km_per_litre" class="col-sm-3 my-2 col-form-label">Kilométrage par litre :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="km_per_litre" name="kilometers_per_liter" step="0.01" value="{{ $car->kilometers_per_liter }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fuel_type" class="col-sm-3 my-2 col-form-label">Type de carburant :</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="fuel_type" name="fuel_type" required>
                                    <option value="diesel" {{ $car->fuel_type == 'diesel' ? 'selected' : '' }}>Diesel</option>
                                    <option value="hybride" {{ $car->fuel_type == 'hybride' ? 'selected' : '' }}>Hybride</option>
                                    <option value="essence" {{ $car->fuel_type == 'essence' ? 'selected' : '' }}>Essence</option>
                                    <option value="électrique" {{ $car->fuel_type == 'électrique' ? 'selected' : '' }}>Électrique</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="transmission_type" class="col-sm-3 my-2 col-form-label">Type de transmission :</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="transmission_type" name="transmission_type" required>
                                    <option value="Automatique" {{ $car->transmission_type == 'Automatique' ? 'selected' : '' }}>Automatique</option>
                                    <option value="Manuel" {{ $car->transmission_type == 'Manuel' ? 'selected' : '' }}>Manuel</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rental_price" class="col-sm-3 my-2 col-form-label">Prix de location par jour :</label>

                            <div class="col-sm-9">
                                <input type="number" suff class="form-control" id="rental_price" name="daily_rate" step="0.01" value="{{ $car->daily_rate }}" required> FCFA
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="main_image" class="col-sm-3 my-2 col-form-label">Image principale :</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="main_image" name="main_image" accept="image/*" value="{{ $car->main_image }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="secondary_images" class="col-sm-3 my-2 col-form-label">Images secondaires (3 max) :</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control-file" id="secondary_images" name="secondary_images[]" accept="image/*" value="{{ $car->secondary_images }}" required multiple>
                            </div>
                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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

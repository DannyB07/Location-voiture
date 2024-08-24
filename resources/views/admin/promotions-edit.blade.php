@extends('admin.layouts.master')

@section('title')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Modifier la promotion</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.promotions.index') }}">promotions</a></li>

        </ol>

        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.promotions.update', ['promotion' => $promotion->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="code" class="col-sm-3 my-2 col-form-label">Code de promotion :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="code" name="code" value="{{ $promotion->code }}" required>
                            </div>
                        </div>

                        <div class="form-group row my-4">
                            <label for="montant_reduction" class="col-sm-3 my-2 col-form-label"> Montant de la remise :</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="montant_reduction" name="montant_reduction" value="{{ $promotion->montant_reduction }}" required>
                            </div>
                        </div>

                        <div class="form-group row my-4">
                            <label for="date_limite" class="col-sm-3 my-2 col-form-label">Date limite :</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" id="date_limite" name="date_limite" value="{{ $promotion->date_limite }}" required>
                            </div>
                        </div>

                        <div class="form-group row my-4">
                            <label for="car_id" class="col-sm-3 my-2 col-form-label">Véhicule :</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="car_id" name="car_id" required>
                                    
                                    @foreach($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->brand }} - {{ $car->model }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                <button type="button" class="btn btn-secondary" onclick="window.history.back()">Annuler</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

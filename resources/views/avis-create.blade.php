@extends('layouts.master')

@section('title', 'Créer un Avis')

@section('main')
<div class="container">
    <div class="row row--grid">
        <!-- breadcrumb -->
        <div class="col-12">
            <ul class="breadcrumb">
                <li class="breadcrumb__item"><a href="{{ route('home.index') }}">Accueil</a></li>
                <li class="breadcrumb__item breadcrumb__item--active">Créer un Avis</li>
            </ul>
        </div>
        <!-- end breadcrumb -->

        <!-- title -->
        <div class="col-12">
            <div class="main__title main__title--page">
                <h1>Créer un Avis</h1>
            </div>
        </div>
        <!-- end title -->
    </div>

    <div class="row">
        <div class="col-12 col-lg-8">
            <form action="{{ route('avis.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="car_id">Sélectionnez la voiture</label>
                    <select class="form-control" id="car_id" name="car_id" required>
                        <option value="">Choisir une voiture</option>
                        @foreach($cars as $car)
                            <option value="{{ $car->id }}">{{ $car->brand }} {{ $car->model }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="commentaire">Commentaire</label>
                    <textarea class="form-control" id="commentaire" name="commentaire" rows="5" required>{{ old('commentaire') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="note">Note</label>
                    <select class="form-control" id="note" name="note" required>
                        <option value="">Choisir une note</option>
                        <option value="1">1 - Très mauvais</option>
                        <option value="2">2 - Mauvais</option>
                        <option value="3">3 - Moyen</option>
                        <option value="4">4 - Bon</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Soumettre l'avis</button>
            </form>
        </div>
    </div>
</div>
@endsection

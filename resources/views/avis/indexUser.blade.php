@extends('layouts.master')

@section('title', 'Mes Avis')

@section('main')
<div class="container">
    <div class="row row--grid">
        <!-- breadcrumb -->
        <div class="col-12">
            <ul class="breadcrumb">
                <li class="breadcrumb__item"><a href="{{ route('home.index') }}">Accueil</a></li>
                <li class="breadcrumb__item breadcrumb__item--active">Mes Avis</li>
            </ul>
        </div>
        <!-- end breadcrumb -->

        <!-- title -->
        <div class="col-12">
            <div class="main__title main__title--page">
                <h1>Mes Avis</h1>
            </div>
        </div>
        <div>
            <a class="btn btn-primary m-3" href="{{ route('avis.create') }}" role="button">
                <i class="fas fa-plus shiny-icon"></i>Ajouter un avis</a>
        </div>
        <!-- end title -->
    </div>

    <div class="row row--grid">
        <div class="col-12">
            <!-- content tabs -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel">
                    <div class="row row--grid">
                        <div class="col-12">
                            <!-- Avis Table -->
                            <div class="cart">
                                <div class="cart__table-wrap">
                                    <div class="cart__table-scroll">
                                        <table class="cart__table">
                                            <thead>
                                                <tr>
                                                    <th>Voiture</th>
                                                    <th>Avis</th>
                                                    <th>Note</th>
                                                    <th>Date de Création</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($avis as $avi)
                                                <tr>
                                                    <td>{{ $avi->car->brand }} {{ $avi->car->model }}</td>
                                                    <td>{{ $avi->commentaire }}</td>
                                                    <td>{{ $avi->note }}/5</td>
                                                    <td>{{ $avi->created_at->format('d/m/Y') }}</td>
                                                    <td><a href="{{ route('avis.destroy', ['id' => $avi->id]) }}" class="btn btn-danger">Supprimer</a></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- end Avis Table -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content tabs -->
        </div>
    </div>
</div>
@endsection

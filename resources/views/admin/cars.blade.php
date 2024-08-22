@extends('admin.layouts.master')

@section('title', 'Voitures')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des véhicules</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Voitures</li>
        </ol>
        <!-- <div class="card mb-4">
            <div class="card-body">
                Ici vous pouvez voir toute les voitures de notre parking.
            </div>
        </div>-->
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <style>
            /* Animation de brillance multicolore */
            @keyframes shine {
                0% {
                    text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0000, 0 0 20px #ff0000, 0 0 25px #ff0000, 0 0 30px #ff0000, 0 0 35px #ff0000;
                    color: #ff0000;
                }
                25% {
                    text-shadow: 0 0 5px #ff8c00, 0 0 10px #ff8c00, 0 0 15px #ff8c00, 0 0 20px #ff8c00, 0 0 25px #ff8c00, 0 0 30px #ff8c00, 0 0 35px #ff8c00;
                    color: #ff8c00;
                }
                50% {
                    text-shadow: 0 0 5px #ffff00, 0 0 10px #ffff00, 0 0 15px #ffff00, 0 0 20px #ffff00, 0 0 25px #ffff00, 0 0 30px #ffff00, 0 0 35px #ffff00;
                    color: #ffff00;
                }
                75% {
                    text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00, 0 0 15px #00ff00, 0 0 20px #00ff00, 0 0 25px #00ff00, 0 0 30px #00ff00, 0 0 35px #00ff00;
                    color: #00ff00;
                }
                100% {
                    text-shadow: 0 0 5px #0000ff, 0 0 10px #0000ff, 0 0 15px #0000ff, 0 0 20px #0000ff, 0 0 25px #0000ff, 0 0 30px #0000ff, 0 0 35px #0000ff;
                    color: #0000ff;
                }
            }

            /* Appliquer l'animation */
            .shiny-icon {
                display: inline-block;
                animation: shine 4s infinite alternate;
                font-size: 18px; /* Ajustez la taille de l'icône ici */
            }
        </style>


        <div class="mb-4">
            <div>
                <a class="btn btn-primary m-3" href="{{ route('admin.car.create') }}" role="button"><i class="fas fa-plus shiny-icon"></i>Ajouter une voiture</a>
            </div>
            <div table-responsive>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Modèle</th>
                            <th>Marque</th>
                            <th>Prix par jour</th>
                            <th>Disponible</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $car)
                        <tr>
                            <td>{{ $car->id }}</td>
                            <td>{{ $car->model}}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->daily_rate }}</td>
                            <td>{{ $car->available ? 'Vrai' : 'Faux' }}</td>
                            <td>
                                        <a class="btn btn-sm btn-info rounded-pill" href="{{ route('admin.car.show', ['id' => $car->id]) }}"> <i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-warning rounded-pill" href="{{ route('admin.car.edit', ['id' => $car->id]) }}"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.car.destroy', ['id' => $car->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette voiture?');"><i class="fas fa-trash"></i></button>
                                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

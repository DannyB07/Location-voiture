@extends('admin.layouts.master')

@section('title')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des agences</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">agences</li>
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
                <a class="btn btn-primary m-3 disabled" href="{{ route('admin.agences.create') }}" role="button"><i class="fas fa-plus shiny-icon"></i>Ajouter une agence</a>
            </div>
            <div table-responsive>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Nom_entreprise</th>
                            <th>Nom_propriétaire</th>
                            <th>Adresse</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Site web</th>
                            <th>Compte Facebook</th>
                            <th>Compte Instagram</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agences as $agence)
                        <tr>
                            <td>{{ $agence->id }}</td>
                            <td>{{ $agence->logo }}</td>
                            <td>{{ $agence->nom_entreprise }}</td>
                            <td>{{ $agence->nom_proprietaire }}</td>
                            <td>{{ $agence->adresse }}</td>
                            <td>{{ $agence->phone }}</td>
                            <td>{{ $agence->email }}</td>
                            <td>{{ $agence->facebook }}</td>
                            <td>{{ $agence->instagram }}</td>

                            <td>
                                        <a class="btn btn-sm btn-info rounded-pill" href="{{ route('admin.car.show', ['id' => $agence->id]) }}"> <i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-warning rounded-pill" href="{{ route('admin.car.edit', ['id' => $agence->id]) }}"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.car.destroy', ['id' => $agence->id]) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette agence?');"><i class="fas fa-trash"></i></button>
                                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $agences->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

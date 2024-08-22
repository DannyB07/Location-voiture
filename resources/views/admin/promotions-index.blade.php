@extends('admin.layouts.master')

@section('title', "Liste des Promotions")

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des Promotions</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Promotions</li>
        </ol>

        <div class="mb-4">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.promotions.create') }}" class="btn btn-primary">Ajouter une Promotion</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                    <th>#</th>
                                    <th>Code</th>
                                    <th>Montant Réduction (%)</th>
                                    <th>Date Limite</th>
                                    <th>Voiture</th>
                                    <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($promotions as $promotion)
                            <tr>
                                <td>{{ $promotion->id }}</td>
                                <td>{{ $promotion->code }}</td>
                                <td>{{ $promotion->montant_reduction }}</td>
                                <td>{{ $promotion->date_limite }}</td>
                                <td>
                                    @if($promotion->car && $promotion->car->marque)
                                    {{ $promotion->car->marque->name }} - {{ $promotion->car->model }}
                                @elseif($promotion->car)
                                    {{ 'Marque inconnue' }} - {{ $promotion->car->model }}
                                @else
                                    {{ 'Voiture inconnue' }}
                                @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.promotions.edit', $promotion->id) }}" class="btn btn-warning rounded-pill btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.promotions.destroy', $promotion->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger rounded-pill btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette promotion ?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $promotions->links() }} <!-- Pagination -->
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

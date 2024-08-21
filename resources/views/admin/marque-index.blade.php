@extends('admin.layouts.master')

@section('title', 'Marques')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Liste des marques</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Marques</li>
        </ol>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="mb-4">
            <a class="btn btn-primary m-3" href="{{ route('admin.marque.create') }}" role="button">Ajouter une marque</a>
            <div table-responsive>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($marques as $marque)
                        <tr>
                            <td>{{ $marque->id }}</td>
                            <td>{{ $marque->name }}</td>
                            <td>
                                <a class="btn btn-sm btn-warning rounded-pill" href="{{ route('admin.marque.edit', $marque->id) }}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.marque.destroy', $marque->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-pill"  onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette marque?');"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $marques->links() }}
            </div>
        </div>
    </div>
</main>
@endsection

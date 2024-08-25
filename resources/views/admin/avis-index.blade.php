@extends('admin.layouts.master')

@section('title', 'Gestion des avis')

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Gestion des avis</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item active">Avis</li>
        </ol>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($avisNonApprouves->isEmpty())
            <p>Aucun avis en attente d'approbation.</p>
        @else
            <div class="mb-4">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Utilisateur</th>
                                <th>Véhicule</th>
                                <th>Commentaire</th>
                                <th>Note</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($avisNonApprouves as $avis)
                            <tr>
                                <td>{{ $avis->id }}</td>
                                <td>{{ $avis->user->first_name }} {{ $avis->user->last_name }}</td>
                                <td>{{ $avis->car->brand }}</td>
                                <td>{{ $avis->commentaire }}</td>
                                <td>
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $avis->note)
                                            &#9733;
                                        @else
                                            &#9734;
                                        @endif
                                    @endfor
                                </td>
                                <td>
                                    <form action="{{ route('admin.avis.approuver', $avis->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-success rounded-pill">Approuver</button>
                                    </form>

                                    <form action="{{ route('admin.avis.rejeter', $avis->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Êtes-vous sûr de vouloir rejeter cet avis?');">Rejeter</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $avisNonApprouves->links() }}
            </div>
        @endif
    </div>
</main>
@endsection

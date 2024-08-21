@extends('admin.layouts.master')

@section('title', "Modifier {{ $marque->name }}")

@section('main')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Modifier la marque</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Accueil</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.marque.index') }}">Marques</a></li>
            <li class="breadcrumb-item active">{{ $marque->name }}</li>
        </ol>

        <div class="mb-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.marque.update', ['marque' => $marque->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 my-2 col-form-label">Nom de la marque :</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $marque->name }}" required>
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

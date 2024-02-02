@extends('base')

@section('header')
    <!-- Page Header Start -->
    @include('parts.header', ['path' => $car->title, 'domain' => 'Admin', 'domainRoute' => route('cars')])
    <!-- Page Header Start -->
@endsection

@section('content')
    <div class="mt-5 fs-4 text-center">
        Êtes-vous réellement sûr de vouloir supprimer ce véhicule ?
        <div class="mb-5">
            <a href="{{ route('cars') }}" class="btn btn-primary py-md-3 px-md-5 mt-2 ms-4">Retour</a>
            <form action="" method="post" class="d-inline-block">
                @csrf
                <button type="submit" class="btn btn-danger py-md-3 px-md-5 mt-2 ms-4">Supprimer</a>
            </form>
        </div>
    </div>
@endsection

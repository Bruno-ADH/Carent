@extends('base')

@section('content')
    <div class="row col-12 col-lg-8 mx-auto">
        <div class="card my-5">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0">Confirmer la réservation Véhicule</h5>
                    </div>
                    <hr>
                    <div>
                        <h4 class="sm bold">Info Véhicule</h4>

                        <img style="max-height: 300px;" class="img-thumbnail" src="{{ $car->imageUrl() }}"
                            alt="{{ $car->title }}">
                        <h5 class="mt-2">{{ $car->title }}</h5>
                        <div>{{ $car->description }}</div>
                        <hr>
                        <h4 class="sm bold">Info Relatives à la Réservation</h4>
                        <ul>
                            <li>Date de Début Réservation : <span class="fw-bold">{{ $rent['date_from'] }}</span></li>
                            <li>Date de Fin Réservation : <span class="fw-bold">{{ $rent['date_to'] }}</span></li>
                        </ul>
                    </div>
                    <hr>

                    <form class="d-inline-block" action="{{ route('rent.doRent', $rent) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success py-md-3 px-md-5 mt-2">
                            Confirmer</button>
                    </form>
                    <a href="{{ route('check-availability') }}"
                        class="btn btn-danger py-md-3 px-md-5 mt-2 d-inline-block">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection

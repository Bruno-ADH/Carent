@extends('base')

@section('header')
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        @include('parts.header', [
            'path' => $car->title,
            'domain' => 'Accueil',
            'domainRoute' => route('home'),
        ])
    </div>
    <!-- Page Header Start -->
@endsection

@section('content')
    @include('parts.detail')
@endsection

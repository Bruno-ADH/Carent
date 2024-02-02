@extends('base')

@section('header')
    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        @include('parts.header')
    </div>
    <!-- Page Header Start -->
@endsection

@section('content')
    <div class="row col-12 col-lg-8 mx-auto">
        <div class="card my-5">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0">
                            @if (!$car->id)
                                Ajout d'un véhicule
                            @else
                                Modification du véhicule
                            @endif
                        </h5>
                    </div>
                    <hr>
                    <form
                        @if (!$car->id) action="{{ route('car.store') }}"
                    @else
                    action="" @endif
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-sm-3 col-form-label">Titre</label>
                            <div class="col-sm-9">
                                <input name="title" type="text" value="{{ old('title', $car->title) }}"
                                    class="form-control" id="title" placeholder="ex: Honda Duriang...">
                            </div>
                            @error('title')
                                <div class="col-sm-12 text-danger my-2 d-flex justify-content-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="brand" class="col-sm-3 col-form-label">Marque</label>
                            <div class="col-sm-9">
                                <input name="brand" type="text" value="{{ old('brand', $car->brand) }}"
                                    class="form-control" id="brand" placeholder="ex: Suzuki...">
                            </div>
                            @error('brand')
                                <div class="col-sm-12 text-danger my-2 d-flex justify-content-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="model" class="col-sm-3 col-form-label">Modèle</label>
                            <div class="col-sm-9">
                                <input name="model" type="text" value="{{ old('model', $car->model) }}"
                                    class="form-control" id="model" placeholder="ex: Athleon FT...">
                            </div>
                            @error('model')
                                <div class="col-sm-12 text-danger my-2 d-flex justify-content-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="top_speed" class="col-sm-3 col-form-label">Vitesse max</label>
                            <div class="col-sm-9">
                                <input name="top_speed" type="number" value="{{ old('top_speed', $car->top_speed) }}" min="1"
                                    max="300" class="form-control" id="top_speed">
                            </div>
                            @error('top_speed')
                                <div class="col-sm-12 text-danger my-2 d-flex justify-content-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-sm-3 col-form-label">Image Véhicule</label>
                            <div class="col-sm-9">
                                <input name="image" type="file" class="form-control" id="image">
                            </div>
                            @error('image')
                                <div class="col-sm-12 text-danger my-2 d-flex justify-content-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                                <textarea name="description" class="form-control" id="description" rows="5"
                                    placeholder="Écrivez une description du véhicule...">{{ old('description', $car->description) }}</textarea>
                            </div>
                            @error('description')
                                <div class="col-sm-12 text-danger my-2 d-flex justify-content-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <button type="submit" class="btn btn-primary py-md-3 px-md-5 mt-2">Sauvegarder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('base')

@section('csrf')
    <meta content="{{ csrf_token() }}" name="csrf-token">
@endsection

@section('content')
    <div class="row col-12 col-lg-8 mx-auto">
        <div class="card my-5">
            <div class="card-body">
                <div class="border p-4 rounded">
                    <div class="card-title d-flex align-items-center">
                        <h5 class="mb-0">Réserver un Véhicule</h5>
                    </div>
                    <hr>
                    <form id="availabityForm" action="" method="post">
                        <div class="row mb-4">
                            <label for="date_from" class="col-sm-5 col-form-label">Date Début Location</label>
                            <div class="col-sm-7">
                                <input name="date_from" type="date" value="{{ old('date_from') }}"
                                    class="form-control" id="date_from">
                            </div>
                            <div class="ms-3 form-text text-danger d-none errorSearching"></div>
                            @error('date_from')
                                <div class="col-sm-12 text-danger my-2 d-flex justify-content-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <label for="date_to" class="col-sm-5 col-form-label">Date Fin Location</label>
                            <div class="col-sm-7">
                                <input name="date_to" type="date" value="{{ old('date_to') }}"
                                    class="form-control" id="date_to">
                            </div>
                            <div class="ms-3 form-text text-danger d-none errorSearching"></div>
                            @error('date_to')
                                <div class="col-sm-12 text-danger my-2 d-flex justify-content-center">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3 px-5 pt-md-5">
                            <button type="button" class="btn btn-primary py-md-3 px-md-5 mt-2"
                                id="btn-save">Sauvegarder</button>
                        </div>
                    </form>
                    <div class="border p-2 mt-3" id="result"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
   <script src="{{ asset('/assets/js/rent.js') }}"></script> 
   <script src="{{ asset('/assets/js/rentForm.js') }}"></script> 
@endsection

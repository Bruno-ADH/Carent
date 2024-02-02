<div class="row g-2 p-2 parking-container">
    @forelse ($cars as $car)
        <div class="col-xl-4 col-lg-6 col-md-6 parking-item {{ $car?->category }}">
            <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                <div class="position-relative parking-box">
                    <img class="img-fluid" src="{{ $car->imageUrl() }}" alt=""><a class="parking-btn"
                        href="{{ $car->imageUrl() }}" data-lightbox="parking">
                        <i class="bi bi-plus text-white"></i>
                    </a>
                </div>
                <div class="p-1">
                    <h4 class="text-uppercase mb-1">{{ $car->title }}</h4>
                    @php
                        $rent = [];

                        $rent['date_from'] = request()->input('date_from');
                        $rent['date_to'] = request()->input('date_to');
                        $rent['user_id'] = Auth::user()->id;
                        $rent['car_id'] = $car->id;
                    @endphp
                    <div>
                        <form action="{{ route('rent.validation-form', ['rent' => $rent]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary p-2 mt-2">Réserver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <div class="display-3 fw-bold text-center my-5">Aucun véhicule n'est disponible à la réservation</div>
    @endforelse
</div>

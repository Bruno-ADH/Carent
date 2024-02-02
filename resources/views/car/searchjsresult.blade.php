<div class="row g-5 parking-container mb-5">
    @forelse ($result as $car)
        <div class="col-xl-4 col-lg-6 col-md-6 parking-item {{ $car->brand }}">
            <div class="service-item bg-white d-flex flex-column align-items-center text-center">
                <div class="position-relative parking-box">
                    <img class="img-fluid" src="{{ $car->imageUrl() }}" alt=""><a class="parking-btn"
                        href="{{ $car->imageUrl() }}" data-lightbox="parking">
                        <i class="bi bi-plus text-white"></i>
                    </a>
                </div>
                <div class="px-4 pb-4">
                    <h4 class="text-uppercase mb-3">{{ $car->title }}</h4>
                    <p>{{ $car->description }}</p>
                    @if (Auth::user()?->role == 'admin')
                        <div>
                            <a href="{{ route('car.update', ['id' => $car->id]) }}"
                                class="btn btn-sm btn-primary p-2 mt-2">Modifier</a>
                            <a href="{{ route('car.delete', ['id' => $car->id]) }}"
                                class="btn btn-sm btn-danger p-2 mt-2">Supprimer</a>
                        </div>
                    @endif
                    <a class="btn text-primary" href="{{ route('car.show', ['id' => $car->id]) }}">Voir Plus
                        <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    @empty
        <div class="display-4 fw-bold text-center my-5">Aucune correspondance</div>
    @endforelse
</div>
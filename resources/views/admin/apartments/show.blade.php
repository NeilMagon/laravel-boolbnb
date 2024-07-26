@extends('layouts.admin')
@php 
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="d-flex flex-column" style="margin-bottom: 200px">
        <div class="d-flex align-items-center  show-header pb-2">
            <a href="{{ route('admin.apartments.index') }}" class="my-arrow-left text-dark"><i class="fa-solid fa-chevron-left"></i></a>
            <h3 class="fw-bold ms-3 mb-0">Torna alle case</h3>
        </div>

        {{-- NOME IMMOBILE --}}
        <div class="mb-1 d-flex">
            <h3 class="fw-bold mt-4"> {{$apartment->title}}</h3> 
        </div>

        {{-- SPONSORIZZAZIONE --}}
        <div class="mb-3 mt-3">
            @if ($apartment->visibility === 1)
                <a href="{{ route('admin.payment.index', ['apartment'=>$apartment->slug])}}" class="btn my-register-btn px-3">Sponsorizzato <i class="fa-solid fa-crown"></i></a>
                @if ($apartment->sponsorships->isNotEmpty())
                    @foreach ($apartment->sponsorships as $sponsorship)
                        @php
                            $expire_date = Carbon::parse($sponsorship->pivot->expire_date);
                            $now = Carbon::now();
                            $diff = $expire_date->diff($now);
                            
                            $days = $diff->days;
                            $hours = $diff->h;
                            $minutes = $diff->i;
                            $seconds = $diff->s;
                            
                            // Formattazione del risultato
                            if ($days > 0) {
                                $formatted_time = "{$days} giorni";
                            } elseif ($hours > 0) {
                                $formatted_time = "{$hours} ore {$minutes} minuti";
                            } elseif ($minutes > 0) {
                                $formatted_time = "{$minutes} minuti";
                            } else {
                                $formatted_time = "{$seconds} secondi";
                            }

                        @endphp
                    <p>Tempo rimanente: {{ $formatted_time }}</p>
                    @endforeach
                @endif
            @elseif ($apartment->visibility === 0)
                <a class="btn my-btn-primary text-white" href="{{ route('admin.payment.index', ['apartment'=>$apartment->slug])}}">
                    Sponsorizza questa casa <i class="fa-solid fa-ranking-star ms-3"></i>
                </a>
            @endif
        </div>

        {{-- STATISTICHE --}}
        <div class="mb-3 mt-3">
            <span>numero visite: {{$viewsCount }}</span>
        </div>

        {{-- FOTO PRINCIPALE --}}
        <div class="overflow-hidden ms-image-container mt-3">
            <h3 class="mb-2">Foto principale:</h3>
            @if ($apartment->thumb)
                @if (filter_var($apartment->thumb, FILTER_VALIDATE_URL))
                    <img src="{{ $apartment->thumb }}" alt="{{ $apartment->title }}" class="ms-img">
                @else
                    <img src="{{ asset('storage/' . $apartment->thumb) }}" alt="{{ $apartment->title }}" class="ms-img">
                @endif
            @endif
        </div>

        {{-- IMMAGINI --}}
        {{-- carosello immagini --}}
        <div class="mt-4">
            <h3 class="mb-2">Altre immagini:</h3>
            @if ($apartment->images->count())
                <div id="apartmentImagesCarousel" class="carousel slide mb-3 ms-image-container" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($apartment->images as $index => $image)
                            @if ($image->image)
                                <div class="carousel-item @if ($index == 0) active @endif">
                                    <img src="{{ filter_var($image->image, FILTER_VALIDATE_URL) ? $image->image : asset('storage/' . $image->image) }}" 
                                         alt="{{ $apartment->title }}" class="d-block w-100 ms-img" data-bs-toggle="modal" data-bs-target="#lightboxModal" data-bs-slide-to="{{ $index }}">
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#apartmentImagesCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#apartmentImagesCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <p>Nessuna immagine aggiuntiva disponibile.</p>
            @endif
        </div>
        {{-- modale carosello immagini --}}
        <div class="modal fade" id="lightboxModal" tabindex="-1" aria-labelledby="lightboxModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lightboxModalLabel">Galleria Immagini</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="lightboxCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($apartment->images as $index => $image)
                                    @if ($image->image)
                                        <div class="carousel-item @if ($index == 0) active @endif">
                                            <img src="{{ filter_var($image->image, FILTER_VALIDATE_URL) ? $image->image : asset('storage/' . $image->image) }}" 
                                                 alt="{{ $apartment->title }}" class="d-block w-100 ms-img">
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#lightboxCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- MAPPA --}}
        <h3 class="mt-2">Mappa:</h3>
        <div class="mb-3 input-control" hidden>
            <label for="latitude" class="form-label">Latitudine</label>
            <p id="latitude">{{ $apartment->latitude }}</p>
        </div>
        <div class="mb-3 input-control" hidden>
            <label for="longitude" class="form-label">Longitudine</label>
            <p id="longitude">{{ $apartment->longitude }}</p>
        </div>
        <div id="map" class="mt-1" style="max-width: 600px; height: 400px;"></div>
        <div class="mb-3 mt-3 input-control">
            <label for="address" id="address" class="form-label">Indirizzo: {{ $apartment->address }}</label>
        </div>

        {{-- PREZZO --}}
        {{-- <h3>Prezzo:</h3>
        <p class="dashboard-p">
            <span class="price-bold">{{$apartment->price}} €</span> a notte.
        </p> --}}

        {{-- DETTAGLI N.CAMERA LETTO, LETTI E BAGNI --}}
        <h3>Info:</h3>
        <p class="dashboard-p">
            @if ($apartment->number_of_room < 2)
                {{$apartment->number_of_room}} camera da letto &#183;
            @elseif ($apartment->number_of_room >= 2)
                {{$apartment->number_of_room}} camere da letto &#183;
            @endif

            @if ($apartment->number_of_bed < 2)
                {{$apartment->number_of_bed}} letti &#183;
            @elseif ($apartment->number_of_bed >= 2)
                {{$apartment->number_of_bed}} letti &#183;
            @endif

            @if ($apartment->number_of_bath < 2)
                {{$apartment->number_of_bath}} bagno &#183;
            @elseif ($apartment->number_of_bath >= 2)
                {{$apartment->number_of_bath}} bagni &#183;
            @endif

            {{$apartment->square_meters}} m<sup>2</sup>
        </p>

        {{-- SERVIZI --}}
        <h3 class="mb-2">Servizi inclusi:</h3>
        @if (count($apartment->services) > 0)
            @php
                $half = ceil(count($apartment->services) / 2);
                $servicesChunked = $apartment->services->chunk($half);
            @endphp
            <div class="services-container">
                @foreach ($servicesChunked as $services)
                    <ul class="services-column" style="list-style: none; padding: 0;">
                        @foreach ($services as $service)
                            <li class="li-services mt-2">
                                <i class="{{ $service->icon }}"></i> {{ $service->name }}
                            </li>
                        @endforeach
                    </ul>
                @endforeach
            </div>
        @else
            <p>nessun servizio offerto</p>
        @endif
            

        {{-- BUTTON ELIMINA & MODIFCA --}}
        <h3 class="mt-3">Descrizione:</h3>
        <p class="dashboard-p">{{$apartment->description}}</p>
        <div class="d-flex mt-4">
            <a href="{{ route('admin.apartments.edit', ['apartment' => $apartment->slug]) }}" class="btn btn-outline-dark">
                Modifica casa<i class="fa-solid fa-pen ms-3"></i>
            </a>
            <form action="{{ route('admin.apartments.destroy', ['apartment' => $apartment->slug]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn my-btn-primary text-white ms-5 js-delete-btn" data-apartment-title="{{ $apartment->title }}">
                Elimina casa<i class="fa-solid fa-trash ms-3"></i>
                </button>
            </form>  
        </div>
    </div>
    <!-- modale -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="confirmDeleteModal">Conferma Eliminazione</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Chiudi</button>
                <button type="button" id="confirm-deletion" class="btn my-btn-primary text-white">Cancella</button>
            </div>
        </div>
    </div>
@endsection
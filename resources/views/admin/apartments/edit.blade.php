@extends('layouts.admin')

@section('content')
<div class="container pb-5 mb-5">
    <div class="d-flex align-items-center mb-4 show-header pb-2">
        <a href="{{ route('admin.apartments.show', ['apartment' => $apartment->slug]) }}" class="my-arrow-left text-dark"><i class="fa-solid fa-chevron-left"></i></a>
        <h2 class="fw-bold ms-3 mb-0">Modifica casa</h2>
    </div>

    <form id="edit-form" action="{{ route('admin.apartments.update', ['apartment' => $apartment->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Nome dell'immobile -->
        <div class="mb-3 input-control">
            <label for="title" class="form-label">Nome dell'immobile *</label>
            <input type="text" placeholder="Inserisci il nome della tua casa" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $apartment->title) }}">
            <div class="error"></div>
            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Indirizzo -->
        <div class="mb-3 input-control">
            <label for="address" class="form-label">Indirizzo *</label>
            <input type="text" placeholder="es. Via Roma, 58, Roma" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $apartment->address) }}">
            <div class="error"></div>
            <ul id="suggestions"></ul>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="hidden" id="latitude" name="latitude" value="{{ old('latitude', $apartment->latitude) }}">
            <input type="hidden" id="longitude" name="longitude" value="{{ old('longitude', $apartment->longitude) }}">
        </div>

        <!-- Immagine di copertina -->
        <div class="mb-3">
            <label for="thumb" class="form-label @error('thumb') is-invalid @enderror">Immagine di copertina *</label>
            @if ($apartment->thumb)
                <div class="mb-3 ms-image-container">
                    <img src="{{ $apartment->thumb ? (filter_var($apartment->thumb, FILTER_VALIDATE_URL) ? $apartment->thumb : asset('storage/' . $apartment->thumb)) : '' }}" alt="{{ $apartment->title }}" class="ms-img">
                </div>
            @endif
            <input class="form-control @error('thumb') is-invalid @enderror" type="file" id="thumb" name="thumb">
            @error('thumb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Altre immagini -->
        <label for="image" class="form-label">Altri immagini (min.4) *</label>
        <div class="row m-0 mb-3">
            {{-- @foreach ($apartment->images as $image)
                <div class="ms-img-container col-6 col-lg-3 mb-3 position-relative">
                    <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $apartment->title }}" class="ms-img">
                    <button type="button" class="btn btn-danger btn-sm delete-image-btn" data-image-id="{{ $image->id }}">Elimina</button>
                </div>
            @endforeach --}}
            @foreach ($apartment->images as $image)
                    @if ($image->image)
                        @if (filter_var($image->image, FILTER_VALIDATE_URL))
                            <div class="ms-img-container col-6 col-lg-3  mb-3">
                                <div class="position-relative">
                                    <img src="{{ $image->image }}" alt="{{ $apartment->title }}" class="ms-img">
                                    {{-- <button type="button" class="btn btn-danger btn-sm delete-image-btn" data-image-id="{{ $image->id }}">Elimina</button> --}}
                                </div>
                            </div>
                        @else
                            <div class="ms-img-container col-md-6 col-3 mb-3 position-relative">
                                <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $apartment->title }}" class="ms-img">
                                {{-- <button type="button" class="btn btn-danger btn-sm delete-image-btn" data-image-id="{{ $image->id }}">Elimina</button> --}}
                            </div>
                        @endif
                    @endif
                @endforeach
            <input class="form-control" type="file" id="image" name="image[]" multiple>
        </div>

        <!-- Prezzo -->
        {{-- <div class="mb-3 input-control">
            <label for="price" class="form-label">Prezzo *</label>
            <input type="number" placeholder="Prezzo per una notte" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $apartment->price) }}">
            <div class="error"></div>
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}

        <!-- Metri quadrati -->
        <div class="mb-3 input-control">
            <label for="square_meters" class="form-label">Metri quadrati *</label>
            <input type="number" placeholder="Inserisci i metri quadrati" class="form-control @error('square_meters') is-invalid @enderror" id="square_meters" name="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}">
            <div class="error"></div>
            @error('square_meters')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        
        <div class="d-flex">
            <!-- Numero di stanze -->
            <div class="col-md-4">
                <div class="mb-3 me-3">
                    <label for="number_of_room" class="form-label">Numero di stanze *</label>
                    <select class="form-select" id="number_of_room" name="number_of_room">
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}" @if (old('number_of_room', $apartment->number_of_room) == $i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div> 
            </div>    
            <!-- Numero di letti -->
            <div class="col-md-4">
                <div class="mb-3 me-3">
                    <label for="number_of_bed" class="form-label">Numero di letti *</label>
                    <select class="form-select" id="number_of_bed" name="number_of_bed">
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}" @if (old('number_of_bed', $apartment->number_of_bed) == $i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div>   
            </div> 
            <!-- Numero di bagni -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="number_of_bath" class="form-label">Numero di bagni *</label>
                    <select class="form-select" id="number_of_bath" name="number_of_bath">
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}" @if (old('number_of_bath', $apartment->number_of_bath) == $i) selected @endif>{{ $i }}</option>
                        @endfor
                    </select>
                </div> 
            </div> 
        </div>

        <!-- Servizi -->
        @php
        $zone = $services->chunk(ceil($services->count() / 2));
        @endphp
        <div>
            <h5>Servizi:</h5>
            <div class="mb-3 d-flex">
                @foreach ($zone as $zona)
                <div style="flex: 1;">
                    @foreach ($zona as $service)
                    <div class="form-check p-10">
                        @if ($errors->any())
                            {{-- Se ci sono errori di validazione vuol dire che l'utente ha gia inviato il form quindi controllo l'old --}}
                            <input class="form-check-input" @checked(in_array($service->id, old('services', []))) type="checkbox" name="services[]" value="{{ $service->id }}" id="service-{{ $service->id }}">
                        @else
                            {{-- Altrimenti vuol dire che stiamo caricando la pagina per la prima volta quindi controlliamo la presenza dei servizi nella collection che ci arriva dal db --}}
                            <input class="form-check-input" @checked($apartment->services->contains($service)) type="checkbox" name="services[]" value="{{ $service->id }}" id="service-{{ $service->id }}">
                        @endif
                            <label for="service-{{ $service->id }}"><i class="{{ $service->icon }} me-2"></i>{{ $service->name}}</label>
                    </div>
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>

        <!-- Descrizione -->
        <div class="mb-3 input-control">
            <label for="description" class="form-label">Descrizione *</label>
            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Descrivi dettagliatamente la tua casa..." id="description" rows="10" name="description">{{ old('description', $apartment->description) }}</textarea>
            <div class="error"></div>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" id="createSubmit" class="btn my-btn-primary text-white mt-3">Salva modifiche</button> 
    </form>
</div>

<script src="{{ asset('js/edit.js') }}" ></script>
@endsection

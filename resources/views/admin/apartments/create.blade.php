@extends('layouts.admin')

@section('content')
    <div class="container pb-5 mb-5">
        <div class="d-flex align-items-center mb-4 show-header pb-2">
            <a href="{{ route('admin.apartments.index') }}" class="my-arrow-left text-dark"><i class="fa-solid fa-chevron-left"></i></a>
            <h2 class="fw-bold ms-3 ">Aggiungi un appartamento</h2>
        </div>
        <form id="create-form" action="{{route('admin.apartments.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 input-control">
                <label for="title" class="form-label">Nome dell'immobile *</label>
                <input type="text" placeholder="Inserisci il nome della tua casa" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                <div class="error"></div>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 input-control">
                <label for="address" class="form-label">Indirizzo *</label>
                <input type="text" placeholder="es. Via Roma, 58, Roma" class="form-control @error('title') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
                <div class="error"></div>
                <ul id="suggestions"></ul>
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="hidden" id="latitude" name="latitude">
                <input type="hidden" id="longitude" name="longitude">
            </div>
            <div class="mb-3 input-control">
                <label for="thumb" class="form-label">Immagine di copertina (min.1) *</label>
                <input class="form-control @error('thumb') is-invalid @enderror" type="file" id="thumb" name="thumb" >
                <div class="error"></div>
                @error('thumb')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 input-control">
                <label for="image" class="form-label">Altre immagini (min.4) *</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image[]" multiple>
                <div class="error"></div>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- <div class="mb-3 input-control">
                <label for="price" class="form-label">Prezzo *</label>
                <input type="number" placeholder="Prezzo per una notte"  class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
                <div class="error"></div>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div> --}}
            <div class="mb-3 input-control">
                <label for="square_meters" class="form-label">Metri quadrati *</label>
                <input type="number" placeholder="Inserisci i metri quadrati" class="form-control @error('square_meters') is-invalid @enderror" id="square_meters" name="square_meters" value="{{ old('square_meters') }}">
                <div class="error"></div>
                @error('square_meters')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex">
                <div class="col-md-4">
                    <div class="mb-3 me-3">
                        <label for="number_of_room" class="form-label">Numero di stanze *</label>
                        <select class="form-select" id="number_of_room" name="number_of_room">
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" @if(old('number_of_room', $apartment->number ?? '') == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </div> 
                </div>    
                <div class="col-md-4">
                    <div class="mb-3 me-3">
                        <label for="number_of_bed" class="form-label">Numero di letti *</label>
                        <select class="form-select" id="number_of_bed" name="number_of_bed">
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" @if(old('number_of_bed', $apartment->number ?? '') == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>   
                </div> 
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="number_of_bath" class="form-label">Numero di bagni *</label>
                        <select class="form-select" id="number_of_bath" name="number_of_bath">
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" @if(old('number_of_bath', $apartment->number ?? '') == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                    </div> 
                </div> 
            </div>
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
                            <input @checked(in_array($service->id, old('services', []))) class="service me-1" type="checkbox" name="services[]" value="{{ $service->id }}" id="service-{{ $service->id }}">
                            <label for="service-{{ $service->id }}"><i class="{{ $service->icon }} me-2"></i>{{ $service->name}}</label>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-3 input-control">
                <label for="description" class="form-label">Descrizione *</label>
                <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Descrivi dettagliatamente la tua casa..."  id="description" rows="10" name="description">{{ old('description') }}</textarea>
                <div class="error"></div>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" id="createSubmit" class="btn my-btn-primary text-white mt-3">Salva <i class="fa-solid fa-plus ms-2"></i></button>
        </form>  
    </div>
    <script src="{{ asset('js/create.js') }}" ></script>
@endsection




@extends('layouts.admin')

@section('content')
<div class="container mb-5">
    <h2 class="fw-bold">Ciao {{ Auth::user()->name . " " .Auth::user()->surname }} 👋🏼</h2>
    <p>Controlla come stanno andando i tuoi appartamenti</p>
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3">
                <div class="card text-center">
                    <div class="card-header text-white" style="background-color: #404040"><i class="fa-solid fa-house-user fa-lg me-2 text-white "></i>Appartmenti totali</div>
                        <h1 class="py-1">{{ $apartmentData['total_apartments'] }}</h1>
                    </div>
                </div>
            <div class="col-md-6 mt-3">
                <div class="card text-center">
                    <div class="card-header text-white" style="background-color: #404040"><i class="fa-solid fa-crown fa-lg me-2 text-white "></i>Sponsorizzazioni attive</div>
                        <h1 class="py-1">{{ $apartmentData['total_sponsors'] }}</h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row justify-content-center m-0 p-0 mt-4">
            <div class="col-md-12 overflow-hidden">
                <div class="rounded overflow-hidden">
                    <table class="dashboard-table rounded">
                        <thead>
                            <tr>
                                <th class="pt-1 ps-2"><h4>Nome appartamento</h4></th>
                                <th class="pt-1 text-center"> <h4>Visualizzaizoni</h4></th>
                                <th class="pt-1 text-center"><h4>Messaggi</h4></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($apartmentStats as $apartment)
                                <tr>
                                    <td class="ps-2">{{ $apartment['title'] }}</td>
                                    <td class="ps-2">
                                        <img src="{{ $apartment['thumb'] }}" alt="" srcset="">
                                    </td>
                                    <td class="text-center">{{ $apartment['total_views'] }}</td>
                                    <td class="text-center">{{ $apartment['total_messages'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
        </div> --}}
        <div class="row d-flex px-2 gy-4" style="margin-bottom: 100px">
            {{-- @foreach ($apartmentStats as $apartment)
            <tr>
                <td class="ps-2">{{ $apartment['title'] }}</td>
                <td class="ps-2">
                    <img src="{{ $apartment['thumb'] }}" alt="" srcset="">
                </td>
                <td class="text-center">{{ $apartment['total_views'] }}</td>
                <td class="text-center">{{ $apartment['total_views'] }}</td>
            </tr>
        @endforeach --}}
        @foreach ($apartmentStats as $apartment)
            <div class="col-6 col-md-6 col-xl-4">
                <div class="card text-center">
                    <div class="card-header text-white" style="background-color: #404040;font-size: 15px">{{ $apartment['title'] }}</div>
                    <div class="dashboard-img">
                        <img src="{{ filter_var($apartment['thumb'], FILTER_VALIDATE_URL) ? $apartment['thumb'] : asset('storage/' . $apartment['thumb']) }}" 
                        alt="" class="">
                    </div>
                    <div class="row p-2">
                        <div class="col-6">
                            <div class="container-data-dashboard">
                                <h4 class="h4 m-0 fw-bold">{{ $apartment['total_views'] }}</h4>
                                <p class="m-0">
                                    @if ($apartment['total_views'] == 1)
                                        Visita
                                    @else
                                        Visite
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="container-data-dashboard">
                                <h4 class="h4 m-0 fw-bold">{{ $apartment['total_messages'] }}</h4>
                                <p class="m-0">
                                    @if ($apartment['total_messages'] == 1)
                                        Messaggio
                                    @else
                                        Messaggi
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection

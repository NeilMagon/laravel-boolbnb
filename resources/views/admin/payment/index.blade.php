@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="d-flex align-items-center mb-4 show-header pb-2">
                <a href="{{ route('admin.apartments.show',['apartment' => $apartment->slug]) }}" class="my-arrow-left text-dark"><i class="fa-solid fa-chevron-left"></i></a>
                <h2 class="fw-bold ms-3 m-0">Sponsorizzazione</h2>
            </div>
        </div>
    </div>
    @if ($apartment->visibility === 0)
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white text-center" style="background-color: #FF5A5F">Effettua il pagamento</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form method="post" id="payment-form" action="{{ route('admin.payment.checkout') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="sponsorships" class="form-label">Sponsorizza</label>
                                <select class="form-select" name="sponsorships" id="sponsorships">
                                    <option value="" selected>Seleziona la sponsor per il tuo appartamento</option>
                                    @foreach ($sponsorships as $sponsor)
                                        @php
                                            $duration = '';
                                            if ($sponsor->type === 'One day') {
                                                $duration = '1 giorno';
                                            } elseif ($sponsor->type === 'Three days') {
                                                $duration = '3 giorni';
                                            } elseif ($sponsor->type === 'Six days') {
                                                $duration = '6 giorni';
                                            }
                                        @endphp
                                        <option value="{{ $sponsor->id }}">{{ $duration }} - {{ $sponsor->price }} €</option>
                                    @endforeach
                                </select>
                                @error('sponsorships')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="cardholder-name">Nome del titolare della carta</label>
                                    <input type="text" id="cardholder-name" name="cardholder_name" value="{{ old('cardholder_name', Auth::user()->name . " " . Auth::user()->surname) }}" class="form-control" readonly required>
                                    @error('cardholder_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="apartment-name">Nome appartamento</label>
                                    <input type="text" name="apartment_name" value="{{ old('apartment_name', $apartment->title) }}" class="form-control" readonly required>
                                    <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                                    @error('apartment_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="card-number">Numero della carta di credito</label>
                                <input type="text" id="card-number" name="card_number" value="{{ old('card_number') }}" placeholder="4111 1111 1111 1111" class="form-control" required>
                                @error('card_number')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mb-3">
                                    <label for="expiration-date">Scadenza</label>
                                    <input type="text" id="expiration-date" name="expiration_date" value="{{ old('expiration_date') }}" class="form-control" placeholder="MM/YY" pattern="^(0[1-9]|1[0-2])\/\d{2}$" maxlength="5" required>
                                    @error('expiration_date')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <label for="cvv">CVV</label>
                                    <input type="text" id="cvv" name="cvv" value="{{ old('cvv') }}" class="form-control" placeholder="CVV" required>
                                    @error('cvv')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Elemento per il drop-in UI di Braintree -->
                            <div id="bt-dropin"></div>

                            <div class="d-flex justify-content-center">
                                <!-- Campo nascosto per il nonce generato da Braintree -->
                                <input type="hidden" id="payment_method_nonce" name="payment_method_nonce">
                                <button type="submit" class="btn dashboard-logout px-3 py-2 text-white" style="background-color: #FF5A5F">Paga adesso</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @elseif ($apartment->visibility === 1)
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-white text-center" style="background-color: #FF5A5F">Annulla la sponsorizzazione</div>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form method="post" id="payment-form" action="{{ route('admin.payment.checkout') }}">
                                @csrf
                                <div class="form-group my-3 mx-5">
                                    <label for="cardholder-name">Nome appartamento</label>
                                    <input type="text" name="apartment_name" value="{{ old('apartment_name', $apartment->title) }}" class="form-control" readonly required>
                                    <input type="hidden" name="apartment_id" value="{{ $apartment->id }}">
                                    @error('apartment_name')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group my-3 mx-5">
                                    <label for="cancel_sponsorship" class="form-label">Vuoi annullare la sponsorizzazione?</label>
                                    <select class="form-select" name="cancel_sponsorship" id="cancel_sponsorship">
                                        <option value="no" selected>No</option>
                                        <option value="yes">Sì</option>
                                    </select>
                                    @error('cancel_sponsorship')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn dashboard-logout px-3 py-2 my-3 text-white" id="submit-button" style="background-color: #FF5A5F">Modifica</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection


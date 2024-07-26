@extends('layouts.admin')

@section('content')
<div class="d-flex align-items-center mb-4 show-header pb-2">
    <a href="{{ route('admin.apartments.index') }}" class="my-arrow-left text-dark"><i class="fa-solid fa-chevron-left"></i></a>
    <h2 class="fw-bold ms-3 m-0">Messaggi ricevuti</h2>
</div>
    @if($messages->isEmpty())
        <div class="d-flex flex-column align-items-center">
            <img src="{{ Vite::asset("resources/images/messages.png") }}" alt="" srcset="" style="max-width: 150px">
            <p>Ancora non hai ricevuto messaggi</p>
        </div>
    @else
        <ul class="list-group rounded">
            @foreach($messages as $message)
                <li class="list-group-item mb-2 border rounded">
                    <p><strong>Appartamento:</strong> {{ $message->apartment->title }}</p> 
                    <p><strong>Indirizzo:</strong> {{ $message->apartment->address }}</p> 
                    <p><strong>Nome:</strong> {{ $message->name }}</p>
                    <p><strong>Email:</strong> {{ $message->email }}</p>
                    <p><strong>Oggetto:</strong> {{ $message->object }}</p>
                    <p><strong>Messaggio:</strong> {{ $message->description }}</p>
                    <hr>
                    <form action="{{ route('admin.message.destroy', $message->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn my-btn-primary text-white">Elimina</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
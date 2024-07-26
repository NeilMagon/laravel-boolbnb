@extends('layouts.admin')

@section('content')
    <div class="d-flex align-items-center mb-4 show-header pb-2">
        <a href="{{ route('admin.apartments.index') }}" class="my-arrow-left text-dark"><i class="fa-solid fa-chevron-left"></i></a>
        <h2 class="fw-bold ms-3 m-0">Messaggi eliminati</h2>
    </div>
    @if($messages->isEmpty())
    <div class="d-flex flex-column align-items-center">
        <p style="font-size: 100px"><i class="fa-solid fa-trash-alt fa-lg me-2 primary-color"></i></p>
        <p>Nessun messaggio eliminato</p>
    </div>
    @else
        <ul class="list-group">
            @foreach($messages as $message)
                <li class="list-group-item">
                    <p><strong>Appartamento:</strong> {{ $message->apartment->title }}</p> 
                    <p><strong>Indirizzo:</strong> {{ $message->apartment->address }}</p> 
                    <p><strong>Nome:</strong> {{ $message->name }}</p>
                    <p><strong>Email:</strong> {{ $message->email }}</p>
                    <p><strong>Oggetto:</strong> {{ $message->object }}</p>
                    <p><strong>Messaggio:</strong> {{ $message->description }}</p>
                    <hr>
                    <form action="{{ route('admin.message.restore', $message->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-success">Ripristina</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
@endsection

@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row row-cols-1 mb-5">
        <div class="col py-3">
            <h1>
                I miei messaggi
            </h1>
        </div>

        <div class="col">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
                Torna Indietro
                <i class="fa-solid fa-rotate-left"></i>
            </a>
        </div>
    </div>

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

    <div class="wrapper-messages bg-white py-5 border rounded-4 px-4">
        @foreach ($messages as $message)
        <hr class="m-2">
        <div class="row message">
            <div class="col-1 message-image text-center">
                foto
            </div>
            <div class="col-1 message-name">
                {{ $message->sender_name }} 
            </div>
            <div class="col-2 message-object">
                <strong>{{ $message->object }}</strong>
            </div>
            <div class="col-6 message-text">
                <p>{{ Illuminate\Support\Str::limit($message->sender_text , 95) }}</p>
            </div>
            <div class="col-1 message-time">
               <strong>{{ date('H:i', strtotime($message->created_at)); }}</strong> 
            </div>
        </div>
        @endforeach
        <hr class="m-2">
    </div>

    


    

</div>
@endsection
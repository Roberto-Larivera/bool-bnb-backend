@extends('layouts.admin')

@section('title', ' | Messaggi')

@section('content')
<div class="container h-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 gy-5 mt-5 mt-md-0">
        @foreach ($sponsors as $sponsor)
            <div class="col-12 col-lg-4 d-flex justify-content-center">
                <div class="my-card  p-4">
                     <h2 class="card-title text-center fw-bold {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 py-3 ">{{ explode(' ', $sponsor->title)[1] }}</h2>
                     <h5 class="px-2 py-3 py-xxl-5 text-center">Prezzo: {{ $sponsor->price }} €</h5>
                     <h6 class="px-2 py-3 py-xxl-5 text-center">Durata: {{ $sponsor->duration }} h</h6>
                     <p class="card-text p-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
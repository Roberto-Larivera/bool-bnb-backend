@extends('layouts.admin')

@section('title', ' | Selezione sponsor e appartamento')

@section('content')
<div class="container h-100">
    <div class="row gy-5 mt-5 mt-md-0 d-flex justify-content-center mb-3">
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            <div class="my-card p-4">
                <h2 class="card-title text-center fw-bold {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 py-3 ">{{ explode(' ', $sponsor->title)[1] }}</h2>
                <h5 class="px-2 py-3 py-xxl-5 text-center">Prezzo: {{ $sponsor->price }} €</h5>
                <h6 class="px-2 py-3 py-xxl-5 text-center">Durata: {{ $sponsor->duration }} h</h6>
                <p class="card-text p-2">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
    </div>
    <div class="row gy-5 mt-5 mt-md-0 d-flex justify-content-center mb-3">
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            @if (isset($apartments))
                @foreach ($apartments as $apartment)
                    {{ $apartment->title }}
                @endforeach
            @else 
                {{ $apartment->title }}
            @endif

        </div>
    </div>
</div>

@endsection

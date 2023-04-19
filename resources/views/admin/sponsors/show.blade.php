@extends('layouts.admin')

@section('title', ' | Selezione sponsor e appartamento')

@section('content')

<div class="row row-cols-1 mb-5 my-4 mx-2">
    <div class="col py-3">
        <h1>
            <span class="icon-section me-2">
                <i class="fa-solid fa-sack-dollar fa-sm"></i>
            </span>
            La mia sponsorships
        </h1>
    </div>

    <div class="col">
        <a href="{{ route('admin.sponsors.index') }}" class="back">
            Torna indietro
            <i class="fa-solid fa-rotate-left"></i>
        </a>
    </div>
</div>

<div class="container h-100">
    <div class="row gy-5 mt-5 mt-md-0 d-flex justify-content-center mb-2">
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            <div class="my-card p-4">
                <h2 class="card-title text-center fw-bold {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 py-3 ">{{ explode(' ', $sponsor->title)[1] }}</h2>
                <h5 class="px-2 py-3 py-xxl-5 text-center">Prezzo: {{ $sponsor->price }} €</h5>
                <h6 class="px-2 py-3 py-xxl-5 text-center">Durata: {{ $sponsor->duration }} h</h6>
                <p class="card-text p-2 text-center">{{ $sponsor->description }}</p>
            </div>
        </div>
    </div>
    <div class="row gy-5 mt-5 mt-md-0 d-flex justify-content-center mb-3">
        <div class="col-12 col-lg-4 d-flex justify-content-center">
            @if (isset($apartments))
                @foreach ($apartments as $apartment)
                <div class="my-card mx-3">
                    <h5 class="mx-3 p-3">{{ $apartment->title }}</h5>
                    <div class="p-3">
                        <img class="img-fluid rounded" src="{{ $apartment->main_img }}">
                    </div>
                </div>
                @endforeach
            @else 
                <div class="my-card mx-3">
                    <h5 class="mx-3 p-3 text-center">{{ $apartment->title }}</h5>
                    <div class="p-3">
                        <img class="img-fluid rounded" src="{{ $apartment->main_img }}">
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="button d-none d-lg-block mt-3">
                <a href="{{ route('admin.messages.index',  ['apartment_id' => $apartment->id]) }}" class="secondary-btn me-3">
                    Procedi al pagamento
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

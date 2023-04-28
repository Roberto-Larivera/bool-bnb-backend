@extends('layouts.admin')

@section('title', ' | Sponsorships')

@section('content')

    <div class="row row-cols-1 mb-5 my-4 mx-2">
        <div class="col py-3">
            <h1>
                <span class="icon-section me-2">
                    <i class="fa-solid fa-sack-dollar fa-sm"></i>
                </span>
                Sponsorships
            </h1>
        </div>

        <div class="col">
            <a href="{{ route('admin.dashboard') }}" class="back">
                Torna indietro
                <i class="fa-solid fa-rotate-left"></i>
            </a>
        </div>
    </div>

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')
    <div class="container h-100 d-flex align-items-center justify-content-center p-lg-0">
        <div class="row w-100 gy-5 mt-5 mt-md-0">
            @foreach ($sponsors as $sponsor)
                <div class="col-12 col-lg-4  d-flex justify-content-center">
                    {{-- <a href="{{ route('admin.sponsors.show', [$sponsor->id, 'apartment_id' => $apartment_id]) }}"
                        class="text-decoration-none">
                        <div class="my-card p-4">
                            <h2
                                class="card-title text-center fw-bold {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 py-3 ">
                                {{ explode(' ', $sponsor->title)[1] }}</h2>
                            <h5 class="px-2 py-3 py-xxl-5 text-center">Prezzo: {{ $sponsor->price }} €</h5>
                            <h6 class="px-2 py-3 py-xxl-5 text-center">Durata: {{ $sponsor->duration }} h</h6>
                            <p class="card-text p-2 text-center">{{ $sponsor->description }}</p>
                        </div>
                    </a> --}}
                    <a href="{{ route('admin.sponsors.show', [$sponsor->id, 'apartment_id' => $apartment_id]) }}"
                        class="text-decoration-none w-100">
                        <div class="my-card">
                            <div class="content d-flex flex-column">
                                <h2
                                    class="card-title text-center fw-bold  {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 ">
                                    {{ explode(' ', $sponsor->title)[1] }}
                                </h2>
                                <div class="details ">
                                    <div class="data">
                                        <h5 class=" text-center py-2">Prezzo: {{ $sponsor->price }} €</h5>
                                        <h6 class=" text-center py-2">Durata: {{ $sponsor->duration }} h</h6>
                                        <p class="card-text text-center py-2 px-3">{{ $sponsor->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
@endsection

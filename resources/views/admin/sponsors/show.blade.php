@extends('layouts.admin')

@section('title', ' | Selezione sponsor e appartamento')

@section('content')

<div class="row row-cols-1 mb-2 my-4 mx-2">
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
    <div class="row gy-5 mt-5 mt-md-0 d-flex justify-content-center mb-5">
        @if (isset($apartments))
            <div class="col-xs-12 col-xl-4 d-flex justify-content-center">
                <div class="my-card p-4">
                    <h2 class="card-title text-center fw-bold {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 py-3 ">{{ explode(' ', $sponsor->title)[1] }}</h2>
                    <h5 class="px-2 py-3 py-xxl-5 text-center">Prezzo: {{ $sponsor->price }} €</h5>
                    <h6 class="px-2 py-3 py-xxl-5 text-center">Durata: {{ $sponsor->duration }} h</h6>
                    <p class="card-text p-2 text-center">{{ $sponsor->description }}</p>
                </div>
            </div>
            <div class="col-xs-12 col-xl-8 d-flex justify-content-center align-items-center">
                <table class="table my-4 rounded">
                    <thead>
                        <tr>
                            <th scope="col" class="d-none d-md-table-cell">
                                Foto
                            </th>
                            <th scope="col">
                                Titolo
                            </th>
                            <th scope="col" class="d-none d-lg-table-cell">
                                Indirizzo
                            </th>
                            <th scope="col" class="d-none d-xxl-table-cell">
                                Prezzo / notte
                            </th>
                            <th scope="col">
                                Seleziona
                            </th>
                        </tr>
                    </thead>

                    @foreach ($apartments as $index => $apartment)
                        <tbody>
                            <tr>
                                <td class="d-none d-md-table-cell align-middle">
                                    <div class="apartment-img-container">
                                        <img src="{{ $apartment->main_img }}" alt=" {{ $apartment->title }}" class="img-fluid">
                                    </div>
                                </td>
                                <td class="align-middle">
                                    {{ $apartment->title }}
                                </td>
                                <td class="d-none d-lg-table-cell align-middle">
                                    {{ $apartment->address }}
                                </td>
                                <td class="d-none d-xxl-table-cell align-middle">
                                    {{ $apartment->price }}
                                </td>
                                <td class="align-middle">
                                    <div class="form-check">
                                        <input class="form-check-input input-radio" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table
            </div>
        @else
            <div class="col-md-12 col-lg-6 d-flex justify-content-center">
                <div class="my-card p-4">
                    <h2 class="card-title text-center fw-bold {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 py-3 ">{{ explode(' ', $sponsor->title)[1] }}</h2>
                    <h5 class="px-2 py-3 py-xxl-5 text-center">Prezzo: {{ $sponsor->price }} €</h5>
                    <h6 class="px-2 py-3 py-xxl-5 text-center">Durata: {{ $sponsor->duration }} h</h6>
                    <p class="card-text p-2 text-center">{{ $sponsor->description }}</p>
                </div>
            </div>

            <div class="col-md-12 col-lg-6 d-flex justify-content-center align-items-center">
                <div class="my-card">
                    <h2 class="text-center px-2 pt-5 ">{{ $apartment->title }}</h2>
                    <div class="p-5">
                        <img class="img-fluid rounded" src="{{ $apartment->main_img }}">
                    </div>
                </div>
            </div>
                
        @endif
    </div>

    <div class="row row-cols-1">
        <div class="col-12 d-flex justify-content-center">
            <div class="button mt-3">
                <a href="#" class="secondary-btn me-3">
                    Procedi al pagamento
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
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
    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')
    <div id="sponsor_show" class="container h-100">
        <div class="row gy-5 mt-5 mt-md-0 d-flex justify-content-center mb-5">
            {{-- qui se più appartamenti --}}
            @if (isset($apartments))
                <div class="col-xs-12 col-xl-4 d-flex align-items-start justify-content-center">
                    <div class="my-card-2 p-4">
                        <h2
                            class="card-title text-center fw-bold {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 py-3 ">
                            {{ explode(' ', $sponsor->title)[1] }}</h2>
                        <h5 class="px-2 py-3 py-xxl-5 text-center">Prezzo: {{ $sponsor->price }} €</h5>
                        <h6 class="px-2 py-3 py-xxl-5 text-center">Durata: {{ $sponsor->duration }} h</h6>
                        <p class="card-text p-2 text-center">{{ $sponsor->description }}</p>
                    </div>
                </div>
                {{-- tabella appartamenti --}}
                <div class="col-xs-12 col-xl-8 d-flex justify-content-center align-items-center">
                    <table class="table rounded">
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
                                <th scope="col">
                                    #
                                </th>
                            </tr>
                        </thead>

                        @foreach ($apartments as $index => $apartment)
                            <tbody>
                                <tr>
                                    <td class="d-none d-md-table-cell align-middle">
                                        <div class="apartment-img-container">
                                            <img src="{{ $apartment->full_path_main_img }}" alt=" {{ $apartment->title }}"
                                                class="my-img img-fluid rounded">
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        {{ $apartment->title }}
                                    </td>
                                    <td class="d-none d-lg-table-cell align-middle">
                                        {{ $apartment->address }}
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('admin.payment.token', ['sponsor_id' => $sponsor->id, 'apartment_id' => $apartment->id]) }}"
                                            class="primary-btn me-3">
                                            Paga
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            @else
                {{-- Qui se appartamento singolo --}}
                <div class="col-md-12 col-lg-6 d-flex justify-content-center">
                    <div class="my-card p-4">
                        <h2
                            class="card-title text-center fw-bold {{ strtolower(explode(' ', $sponsor->title)[1]) }} px-2 py-3 ">
                            {{ explode(' ', $sponsor->title)[1] }}</h2>
                        <h6 class="px-2 py-3 py-xxl-5 text-center">Prezzo: {{ $sponsor->price }} h</h6>
                        <h6 class="px-2 py-3 py-xxl-5 text-center">Durata: {{ $sponsor->duration }} h</h6>
                        <p class="card-text p-2 text-center">{{ $sponsor->description }}</p>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 d-flex justify-content-center align-items-center">
                    <div class="my-card">
                        <h2 class="text-center px-2 pt-5 ">{{ $apartment->title }}</h2>
                        <div class="px-5 pt-5">
                            <img class="img-fluid rounded" src="{{ $apartment->full_path_main_img }}">
                        </div>
                        <div class="text-center my-3">
                            <a href="{{ route('admin.payment.token', ['sponsor_id' => $sponsor->id, 'apartment_id' => $apartment->id]) }}"
                                class="secondary-btn">
                                Procedi al pagamento
                            </a>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>

@endsection

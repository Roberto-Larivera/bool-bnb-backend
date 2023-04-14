@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5">
            <div class="col py-3">
                <h1>
                    IL mio appartamento
                </h1>
            </div>

            <div class="col">
                <a href="{{ route('admin.apartments.index') }}" class="btn btn-outline-primary">
                    Torna Indietro
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
            </div>
        </div>
    </div>

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5 align-items-center">
            {{-- Info generali appartamento --}}
            <div class="img-container col col-sm-6">
                <img class="img-fluid rounded" src="{{ $apartment->main_img }}" alt="{{ $apartment->title }}">
            </div>
            <div class="info-container col col-sm-6 py-3 py-sm-0">
                <h2>
                    {{ $apartment->title }}
                </h2>
                <h4>
                    {{ $apartment->address }}
                </h4>

                @if ($apartment->visible == 1)
                    Visibile online: <strong>si</strong>
                @elseif ($apartment->visible == 0)
                    Visibile online: <strong>no</strong>
                @endif

                <div>
                    Prezzo: &euro; {{ $apartment->price }}
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5 align-items-center">
            {{-- Descrizione appartamento --}}
            <div class="col">
                <h2>
                    Descrizione
                </h2>
                <p>
                    {{ $apartment->description }}
                </p>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5 align-items-center">
            {{-- Descrizione appartamento --}}
            <div class="col">
                <h2>
                    Dettagli
                </h2>
                <ul>
                    <li class="ps-2">
                        - {{ $apartment->mq }} mq
                    </li>
                    <li class="ps-2">
                        - Numero stanze: {{ $apartment->max_rooms }}
                    </li>
                    <li class="ps-2">
                        - Numero letti: {{ $apartment->max_beds }}
                     </li>
                     <li class="ps-2">
                        - Numero bagni: {{ $apartment->max_baths }}
                     </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5 align-items-center">
            {{-- Quando ci saranno servizi mettere condizione se non ci sono servizi / ora no per vedere badge --}}
            <div class="col">
                <h2>
                    Servizi
                </h2>
                <div class="services-container">
                    <span class="badge bg-secondary me-3">
                        Wi-fi
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5 align-items-center justify-content-start">
            <div class="col-3">
                {{-- Aggiungere rotta messaggi index --}}
                <a href="#" class="my-btn rounded">
                    Messaggi
                </a>
            </div>
            <div class="col-2">
                {{-- Aggiungere rotta sponsor --}}
                <a href="#" class="my-btn rounded">
                    Sponsorizza
                </a>
            </div>
        </div>
    </div>

@endsection
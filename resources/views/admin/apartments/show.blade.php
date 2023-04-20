@extends('layouts.admin')


@section('title', ' | Il mio appartamento')
@section('content')
    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5">
            <div class="col py-3">
                <h1>
                    <span class="icon-section me-2">
                        <i class="fa-solid fa-building fa-sm"></i>
                    </span>
                    Il mio appartamento
                </h1>
            </div>

            <div class="col">
                <a href="{{ route('admin.apartments.index') }}" class="back">
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
                {{-- img url  --}}
                <img class="img-fluid rounded" src="{{ $apartment->main_img }}">
                {{-- img file  --}}
                {{-- <img class="img-fluid rounded" src="{{ $apartment->getFullPathMainImgAttribute() }}"> --}}
            </div>
            <div class="info-container col col-sm-6 py-3 py-sm-0">
                <h2>
                    {{ $apartment->title }}
                </h2>
                <h4>
                    {{ $apartment->address }}
                </h4>

                @if ($apartment->visible == 1)
                    Visibile online: <i class="fa-solid fa-check"></i>
                @elseif ($apartment->visible == 0)
                    Visibile online: <i class="fa-solid fa-xmark"></i>
                @endif

                <div>
                    <i class="fa-solid fa-sack-dollar"></i> : &euro; {{ $apartment->price }}
                </div>

                {{-- Bottoni Mobile messaggi / sponsor --}}
                <div class="buttons d-lg-none mt-3">
                    <a href="{{ route('admin.messages.index') }}" class="secondary-btn me-3">
                        <i class="fa-regular fa-envelope"></i>
                    </a>

                    {{-- Aggiungere rotta sponsor --}}
                    <a href="#" class="secondary-btn">
                        <i class="fa-solid fa-sack-dollar"></i>
                    </a>
                </div>

                {{-- Bottoni Tablet messaggi / sponsor --}}
                <div class="buttons d-none d-lg-block mt-3">
                   <a href="{{ route('admin.messages.index',  ['apartment_id' => $apartment->id]) }}" class="secondary-btn me-3">
                       Leggi messaggi
                   </a>

                   {{-- Aggiungere rotta sponsor --}}
                   <a href="{{ route('admin.sponsors.index',  ['apartment_id' => $apartment->id]) }}" class="secondary-btn">
                       Sponsorizza
                   </a>
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
        <div class="row row-cols-1 mb-5">
            {{-- Descrizione appartamento --}}
            <div class="col-12 col-sm-6">
                <h2 class="mb-3">
                    Dettagli
                </h2>
                <ul>
                    <li class="ps-2 mb-1">
                        <i class="fa-solid fa-house"></i> 
                        {{ $apartment->mq }} mq
                    </li>
                    <li class="ps-2 mb-1">
                        <i class="fa-solid fa-door-closed"></i>
                        {{ $apartment->rooms }} stanze
                    </li>
                    <li class="ps-2 mb-1">
                        <i class="fa-solid fa-bed"></i> 
                        {{ $apartment->beds }} letti
                     </li>
                     <li class="ps-2 mb-1">
                        <i class="fa-solid fa-toilet-paper"></i> 
                        {{ $apartment->baths }} bagni
                     </li>
                </ul>
            </div>

            <div class="col-12 mt-4 col-sm-6 mt-sm-0">
                <h2 class="mb-3">
                    Servizi
                </h2>
                @if (count($apartment->services) > 0)
                    <div class="services-container">
                        @foreach ($apartment->services as $service)
                            <span class="badge bg-secondary me-2">
                                {{ $service->name }}
                            </span>
                        @endforeach
                    </div>
                @else
                    Nessun servizio aggiunto
                @endif

            </div>
        </div>
    </div>

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5 align-items-center">
            <div class="col">
                <h3>
                    Azioni
                </h3>
                 <div class="actions mt-3">
                    <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="primary-btn me-2">
                        <i class="fa-solid fa-pen my-color-dark"></i>
                    </a>

                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                    
                        <button type="button" class="btn-modal primary-btn" data-bs-toggle="modal" data-bs-target="#modal-delete">
                            <i class="fa-solid fa-trash my-color-dark"></i>
                        </button>
                    
                        <!-- Modal -->
                        <div class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                    Cancella appartamento
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>
                                        Ricorda che se cancelli questo appartamento <strong>tutti i messaggi ricevuti</strong> verranno cancellati.
                                        <br>
                                        Vuoi procedere alla cancellazione?
                                    </p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="primary-btn" data-bs-dismiss="modal">
                                        Chiudi
                                    </button>
                                    <button type="submit" class="secondary-btn">
                                        Cancella
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form> 
               </div>
            </div>
        </div>
    </div>


@endsection
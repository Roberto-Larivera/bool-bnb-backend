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

                {{-- Bottoni Mobile messaggi / sponsor --}}
                <div class="buttons d-lg-none mt-3">
                    <a href="{{ route('admin.messages.index') }}" class="my-action rounded me-3">
                        <i class="fa-regular fa-envelope"></i>
                    </a>

                    {{-- Aggiungere rotta sponsor --}}
                    <a href="#" class="my-action rounded">
                        <i class="fa-solid fa-sack-dollar"></i>
                    </a>
                </div>

                {{-- Bottoni Tablet messaggi / sponsor --}}
                <div class="buttons d-none d-lg-block mt-3">
                   <a href="{{ route('admin.messages.index') }}" class="my-action rounded me-3">
                       Leggi messaggi
                   </a>

                   {{-- Aggiungere rotta sponsor --}}
                   <a href="#" class="my-action rounded">
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
                        - Numero stanze: {{ $apartment->rooms }}
                    </li>
                    <li class="ps-2">
                        - Numero letti: {{ $apartment->beds }}
                     </li>
                     <li class="ps-2">
                        - Numero bagni: {{ $apartment->baths }}
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
                @if (count($apartment->services) > 0)
                    <div class="services-container">
                        @foreach ($apartment->services as $service)
                            <span class="badge bg-secondary me-3">
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
                    <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="my-action rounded me-2">
                        <i class="fa-solid fa-pen my-color-dark"></i>
                    </a>

                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                    
                        <button type="button" class="btn-modal my-action rounded" data-bs-toggle="modal" data-bs-target="#modal-delete">
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
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Chiudi
                                    </button>
                                    <button type="submit" class="my-btn rounded">
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
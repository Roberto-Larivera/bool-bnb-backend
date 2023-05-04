@extends('layouts.admin')


@section('title', ' | Il mio appartamento')
@section('content')
<div id="apartments_show">
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
        <div class="row">
            <div class="d-flex flex-column justify-content-lg-between align-items-lg-center p-0 p-lg-1">
                    {{-- suddivisione principale in col-11 --}}
                <div class="col-12 main-show">
                    <div class="row">
                        <div class="col">
                            <h2>
                                {{ $apartment->title }}
                            </h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p class="mt-2">
                                <div class="pe-2 d-block d-sm-inline">
                                    {{ $apartment->address }}  
                                    <span class="d-none d-sm-inline">
                                        <strong>|</strong>
                                    </span> 
                                </div>
                                <div class="pe-2 d-block d-sm-inline">
                                    @if ($apartment->visible == 1)
                                        Pubblico
                                    @elseif ($apartment->visible == 0)
                                        Privato
                                    @endif
                                    <span class="d-none d-sm-inline">
                                        <strong>|</strong>
                                    </span> 
                                </div>
                                <div class="d-block d-sm-inline">
                                    &euro; {{ $apartment->price }}
                                </div>
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col img-container">
                            <div class="row pt-4 pb-2">
                                <div class="col-12 col-lg-9">
                                    <img class="img-fluid rounded" src="{{ $apartment->full_path_main_img }}">
                                </div>
                            </div>


                            <div class="row row-cols-2 row-cols-md-2 row-cols-lg-6 row-cols-xl-6">
                                @if($imageGallery != [])
                                @forEach($imageGallery as $image_gallery)
                                <div class="col mb-3">
                                    <div class=" ratio ratio-4x3 position-relative preview-hover-hidden">
                                        <img src="{{ asset('storage/'.$image_gallery->path_image) }}" class="rounded  w-70 mb-3 mb-lg-0">
                                        <form action="{{ route('admin.image_gallery.destroy',$image_gallery) }}" method="POST" class="position-absolute top-50 start-50 translate-middle d-flex justify-content-center align-items-center ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-hover-hidden">
                                                <i class="fa-solid fa-trash fa-xl my-color-dark"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                                @if(count($imageGallery) < 4)
                                <div class="col align-self-center mb-3">
                                    
                                    <div class="add-img">
                                        <button class="plus cursor-copy primary-btn" onclick="selectFile()">
                                            <strong>+</strong>
                                        </button>
                                    </div>
                                    <form action="{{ route('admin.image_gallery.store', ['apartment_id' => $apartment->id ]) }}" method="POST"
                                        enctype="multipart/form-data" id="form-imageGallery">
                                        @csrf
                                        
                                        <input type="file" class="d-none" id="path_image" name="path_image" accept="image/*">
                                    </form>
            
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row pt-4">

                        <div class="col-12 col-lg-11 mb-4">
                            <h2>
                                Descrizione
                            </h2>
                            <p>
                                {{ $apartment->description }}
                            </p>
                        </div>


                        <div class="col-10 col-md-6 col-lg-6 mb-4">
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

                        
                        <div class="col-12 col-lg-8 mb-4">
                            <h2 class="mb-3">
                                Servizi
                            </h2>
                            @if (count($apartment->services) > 0)
                                <div class="services-container">
                                    @foreach ($apartment->services as $service)
                                        <span class="my-badge bg-light">
                                            {{ $service->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                Nessun servizio aggiunto
                            @endif
            
                        </div>

                        {{-- Modale --}}
                        <div class="modal" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Cancella appartamento
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Ricorda che se cancelli questo appartamento <strong>tutti i messaggi
                                                ricevuti</strong> verranno cancellati.
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
                        </div>
                    </div>
                </div>

                {{-- suddivisione principale in col-1 --}}
                <div class="col-12 col-lg-1 aside-show rounded-top">
                    <div class="d-flex justify-content-between flex-lg-column align-items-lg-center px-3 py-1 rounded-lg">
                        <div class="aside-edit text-end py-4" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Modifica appartamento">
                            <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="aside-edit">
                                <i class="fa-solid fa-file-pen fa-xl"></i>
                            </a>
                        </div>
                        <div class="aside-delete text-end py-4" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Cancella appartamento">
                            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
        
                                <button type="button" class="btn-modal" data-bs-toggle="modal" data-bs-target="#modal-delete" style="border: 0; background-color: transparent;">
                                    <i class="fa-solid fa-trash fa-xl"></i>
                                </button>
                            </form>
                        </div>
                            @if($apartment->sponsored == false)
                                <div class="aside-sponsor text-end py-4" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Sponsorizza">
                                    <a href="{{ route('admin.sponsors.index',  ['apartment_id' => $apartment->id]) }}">
                                        <i class="fa-solid fa-rocket fa-xl"></i>
                                    </a>
                                </div>
                            @else
                                <div class="aside-sponsor text-end py-4" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Sponsorizzato">
                                    <a class="disabled-link">
                                        <i class="fa-solid fa-rocket fa-xl"></i>
                                    </a>
                                </div>
                            @endif
                        <div class="aside-messages text-end py-4" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Leggi messaggi">
                            <a href="{{ route('admin.messages.index', ['apartment_id' => $apartment->id]) }}">
                                <i class="fa-solid fa-envelope fa-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    


@endsection

@section('javascript')

    <script>
        // img prewiew
        const inputFile = document.getElementById('path_image');
        const formFile = document.getElementById('form-imageGallery');

        if(inputFile != null)
        inputFile.addEventListener('change', () => {
            const file = inputFile.files[0];
            if (file) {
                // const reader = new FileReader();
                // reader.onload = () => {
                //     previewImg.src = reader.result;
                // }
                // reader.readAsDataURL(file);
                // textPreviewImg.classList.add('d-none');
                // previewImg.classList.remove('d-none');
                formFile.submit();
            }
        });


        function selectFile() {
            inputFile.click(); // simula il click sull'input type file
            formFile.addEventListener("change", function() {
                const file = inputFile.files[0];
                if (file) {

                    formFile.submit();
                }

            });
        }
    </script>

@endsection
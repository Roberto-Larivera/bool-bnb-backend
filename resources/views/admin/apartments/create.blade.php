@extends('layouts.admin')

@section('title', ' | Aggiungi')

@section('content')
    <div id="apartments_create" class="container-fluid my-5">
        <div class="row row-cols-1 mb-5">
            <div class="col">
                <h1>
                    <span class="icon-section me-2">
                        <i class="fa-solid fa-building fa-sm"></i>
                    </span>
                    Aggiungi appartamento
                </h1>

            </div>
            <div class="col">
                <a href="{{ route('admin.apartments.index') }}" class="back">
                    Torna Indietro
                    <i class="fa-solid fa-rotate-left"></i>
                </a>
            </div>
        </div>
        @include('admin.partials.errors')
        @include('admin.partials.success')
        @include('admin.partials.warning')
        <div class="row">
            <div class="col">

                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        {{-- titolo, indirizzo, ospiti, letti, camere, bagni, mq, prezzo --}}
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    {{-- titolo  --}}
                                    <div class="mb-3">
                                        <label for="title"
                                            class="form-label  @error('title') text-danger @enderror ">Titolo
                                            <span class="text-danger fw-bold">*</span></label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="title" name="title" placeholder="Esempio titolo" maxlength="70"
                                            value="{{ old('title') }}" required>
                                        @error('title')
                                            <p class="text-danger fw-bold">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- address  --}}
                                    <div class="mb-3 position-relative">
                                        <label for="address"
                                            class="form-label  @error('address') text-danger @enderror ">Indirizzo
                                            completo <span class="text-danger fw-bold">*</span></label>
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address"
                                            placeholder="Esempio Via Mario Rossi, 74, Milano (MI), Italia" maxlength="255"
                                            value="{{ old('address') }}" autocomplete="off">
                                        @error('address')
                                            <p class="text-danger fw-bold">{{ $message }}</p>
                                        @enderror
                                        <div id="menuAutoComplete" class="card position-absolute w-100 radius d-none">
                                            <ul class="list">

                                            </ul>
                                        </div>
                                    </div>

                                </div>


                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12  col-md-6">
                                            {{-- max ospiti --}}
                                            <div class="mb-3">
                                                <label for="max_guests"
                                                    class="form-label  @error('max_guests') text-danger @enderror">Massimo
                                                    ospiti <span class="text-danger fw-bold">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('max_guests') is-invalid @enderror"
                                                    id="max_guests" name="max_guests" placeholder="Esempio 5" min="0"
                                                    max="30" value="{{ old('max_guests') }}" required>
                                                @error('max_guests')
                                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            {{-- stanze da letto --}}
                                            <div class="mb-3">
                                                <label for="rooms"
                                                    class="form-label  @error('rooms') text-danger @enderror">Stanze
                                                    da letto <span class="text-danger fw-bold">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('rooms') is-invalid @enderror" id="rooms"
                                                    name="rooms" placeholder="Esempio 2" min="0" max="30"
                                                    value="{{ old('rooms') }}" required>
                                                @error('rooms')
                                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">

                                            {{-- letti --}}
                                            <div class="mb-3">
                                                <label for="beds"
                                                    class="form-label  @error('beds') text-danger @enderror">Numero
                                                    letti
                                                    <span class="text-danger fw-bold">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('beds') is-invalid @enderror" id="beds"
                                                    name="beds" placeholder="Esempio 3" min="0" max="30"
                                                    value="{{ old('beds') }}" required>
                                                @error('beds')
                                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            {{-- bagni --}}
                                            <div class="mb-3">
                                                <label for="baths"
                                                    class="form-label  @error('baths') text-danger @enderror">Numero
                                                    bagni <span class="text-danger fw-bold">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('baths') is-invalid @enderror"
                                                    id="baths" name="baths" placeholder="Esempio 1" min="0"
                                                    max="30" value="{{ old('baths') }}" required>
                                                @error('baths')
                                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-12 col-md-6">
                                            {{-- mq --}}
                                            <div class="mb-3">
                                                <label for="mq"
                                                    class="form-label  @error('mq') text-danger @enderror">Numero mq
                                                    <span class="text-danger fw-bold">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('mq') is-invalid @enderror" id="mq"
                                                    name="mq" placeholder="Esempio 40" min="0"
                                                    max="65535" value="{{ old('mq') }}" required>
                                                @error('mq')
                                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            {{-- prezzo a notte --}}
                                            <div class="mb-3">
                                                <label for="price"
                                                    class="form-label  @error('price') text-danger @enderror">Prezzo a
                                                    notte <span class="text-danger fw-bold">*</span></label>
                                                <input type="number"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    id="price" name="price" placeholder="Esempio 55"
                                                    step="0.01" min="0.01" max="9999.99"
                                                    value="{{ old('price') }}" required>
                                                @error('price')
                                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- img --}}
                        <div class="col-12 col-lg-6">
                            <div class="row h-100">
                                <div class="col-12">
                                    {{-- Immagine principale file --}}
                                    <div class="row h-100">
                                        <div class="col-12 align-self-start">
                                            <div class="mb-3">
                                                <label for="main_img"
                                                    class="form-label  @error('main_img') text-danger @enderror">Immagine
                                                    in
                                                    evidenza <span class="text-danger fw-bold">*</span></label>
                                                <input type="file"
                                                    class="form-control @error('main_img') is-invalid @enderror"
                                                    id="main_img" name="main_img" accept="image/*" required>
                                                @error('main_img')
                                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                                @enderror
                                            </div>


                                        </div>
                                        <div class="col-12 align-self-start text-center">
                                            <p id="textPreviewImg" class="text-center mt-5 color-primary fw-bold">
                                                Anteprima
                                            </p>

                                            <img id="previewImg" src="#"
                                                class="rounded d-none w-75 mb-3 mb-lg-0 mx-auto">
                                        </div>
                                    </div>

                                    {{-- Immagine principale url --}}
                                    {{-- <div class="mb-3">
                                       <label for="main_img" class="form-label  @error('main_img') text-danger @enderror">Immagine
                                           in
                                           evidenza <span class="text-danger fw-bold">*</span></label>
                                       <input type="string" class="form-control @error('main_img') is-invalid @enderror"
                                           id="main_img" name="main_img" value="{{ old('main_img') }}" maxlength="255"
                                           placeholder="https://bollbnb.com/img-default" required>
                                       @error('main_img')
                                           <p class="text-danger fw-bold">{{ $message }}</p>
                                       @enderror
                                   </div> --}}
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            {{-- descrizione  --}}
                            <div class="mb-3">
                                <label for="description"
                                    class="form-label  @error('description') text-danger @enderror">Descrizione <span
                                        class="text-danger fw-bold">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    placeholder="Esempio descrizione; Lorem ipsum dolor sit amet ..." rows="5" maxlength="4096">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="d-none">
                            <input type="text" id="latitude" name="latitude">
                            <input type="text" id="longitude" name="longitude">
                        </div>

                        <div class="col-12 text-center mb-5 mt-5">
                            {{-- servizi  --}}
                            @if (count($services) > 0)
                                <!-- Button trigger modal -->
                                <button type="button" class="primary-btn" data-bs-toggle="modal"
                                    data-bs-target="#service-model">
                                    + Servizi
                                </button>

                                <!-- Modal -->
                                <div class="modal fade text-start" id="service-model" tabindex="-1"
                                    aria-labelledby="exampleModalScrollableTitle" aria-modal="true" role="dialog">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Servizi</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <h4>
                                                    Scegli uno o più servizi
                                                </h4>
                                                <div class="mb-3">
                                                    <label
                                                        class="form-check-label d-block mb-2 @error('services') text-danger @enderror">
                                                        Servizi
                                                    </label>
                                                    <ul>
                                                        @foreach ($services as $service)
                                                            <li>
                                                                <div class="form-check form-check-inline">
                                                                    <input
                                                                        class="form-check-input  @error('services') is-invalid @enderror"
                                                                        type="checkbox" id="tech-{{ $service->id }}"
                                                                        name="services[]" value="{{ $service->id }}"
                                                                        @if (old('services') && is_array(old('services')) && count(old('services')) > 0) {{ in_array($service->id, old('services', [])) ? 'checked' : '' }} @endif>

                                                                    <label
                                                                        class="form-check-label @error('services') text-danger @enderror"
                                                                        for="tech-{{ $service->id }}">{{ $service->name }}</label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    @error('services')
                                                        <p class="text-danger fw-bold">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="primary-btn" data-bs-dismiss="modal">Chiudi
                                                    e conferma</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-12 d-flex justify-content-center align-items-center">
                            {{-- visibilità online  --}}
                            <div class="form-check me-3">
                                <input class="form-check-input  @error('services') is-invalid @enderror" type="radio"
                                    name="visible" id="visible1" value="1"
                                    {{ old('visible') == 1 ? 'checked' : '' }}>
                                <label class="form-check-label  @error('visible') text-danger @enderror" for="visible1">
                                    Pubblico
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input  @error('services') is-invalid @enderror" type="radio"
                                    name="visible" id="visible2" value="0"
                                    {{ old('visible') == 0 ? 'checked' : '' }}>
                                <label class="form-check-label  @error('visible') text-danger @enderror" for="visible2">
                                    Privato
                                </label>
                            </div>
                            @error('visible')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class="my-5 text-center">
                            <p>
                                I campi contrassegnati con <span class="text-danger fw-bold">*</span> sono <span
                                    class="text-danger fw-bold text-decoration-underline">obbligatori</span>
                            </p>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mb-3">Conferma</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

    <script>
        console.log('ok')

        const keyApi = '6E5E48AYmTSLJcWzgGfmb1HM3bKgrF2h';
        const lat = '45.4642';
        const lon = '9.1900';
        const radius = '20000';

        const search = document.getElementById('address');
        const menuAutoComplete = document.getElementById('menuAutoComplete');
        const menuAutoCompleteClass = menuAutoComplete.classList;
        const ulList = document.querySelector('ul.list');

        const latitude = document.getElementById('latitude');
        const longitude = document.getElementById('longitude');


        search.addEventListener('input', function() {
            if (search.value != '')
                getApiProjects(search.value);
            addRemoveClass();

        })

        // aggiunge e rimuove classi 
        function addRemoveClass() {
            console.log(menuAutoCompleteClass);
            if (search.value == '')
                menuAutoCompleteClass.add('d-none');
            else
                menuAutoCompleteClass.remove('d-none');
        }

        function getApiProjects(adress) {
            fetch(
                    `https://api.tomtom.com/search/2/search/${adress}.json?key=${keyApi}&countrySet=IT&limit=5&lat=${lat}&lon=${lon}&radius=${radius}`
                )
                .then(response => response.json())
                .then(data => {

                    console.log(data.results);


                    ulList.innerHTML = '';
                    if (data.results != undefined)
                        data.results.forEach(function(currentValue, index, array) {
                            const li = document.createElement('li');
                            li.append(currentValue.address.freeformAddress);
                            li.addEventListener('click',
                                () => {
                                    search.value = currentValue.address.freeformAddress;
                                    menuAutoCompleteClass.add('d-none');
                                    ulList.innerHTML = '';
                                    latitude.value = currentValue.position.lat;
                                    longitude.value = currentValue.position.lon;
                                    console.log(latitude.value, 'lat');
                                    console.log(longitude.value, 'lon');
                                }
                            )

                            // fine
                            ulList.appendChild(li);
                        });
                });
        }

        document.addEventListener('click', function(event) {
            // Verifica se il clic è avvenuto all'interno del menu
            const isClickInsideMenu = menuAutoComplete.contains(event.target);

            // Se il clic non è avvenuto all'interno del menu, chiudi il menu
            if (!isClickInsideMenu) {
                menuAutoCompleteClass.add('d-none');
            }
        });

        // img prewiew
        const inputFile = document.getElementById('main_img');
        const previewImg = document.getElementById('previewImg');
        const textPreviewImg = document.getElementById('textPreviewImg');

        inputFile.addEventListener('change', () => {
            const file = inputFile.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    previewImg.src = reader.result;
                }
                reader.readAsDataURL(file);
                textPreviewImg.classList.add('d-none');
                previewImg.classList.remove('d-none');

            }
        });
    </script>

@endsection

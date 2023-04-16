@extends('layouts.admin')

@section('title', ' | Modifica')

@section('content')
    <div id="apartments_update" class="container-fluid my-5">
        <div class="row row-cols-1 mb-5">
            <div class="col">
                <h1>
                    Modifica appartamento
                </h1>

            </div>
            <div class="col">
                <a href="{{ route('admin.apartments.index') }}" class="btn btn-outline-primary">
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

                <form action="{{ route('admin.apartments.update', $apartment) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            {{-- titolo  --}}
                            <div class="mb-3">
                                <label for="title" class="form-label  @error('title') text-danger @enderror ">Titolo
                                    <span class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" placeholder="Esempio titolo" maxlength="98"
                                    value="{{ old('title', $apartment->title) }}" required>
                                @error('title')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Immagine principale file --}}
                            <div class="mb-3">
                                <label for="main_img" class="form-label  @error('main_img') text-danger @enderror">Immagine
                                    in
                                    evidenza <span class="text-danger fw-bold">*</span></label>
                                <input type="file" class="form-control @error('main_img') is-invalid @enderror"
                                    id="main_img" name="main_img" accept="image/*">
                                @error('main_img')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Immagine principale url --}}
                            {{-- <div class="mb-3">
                                <label for="main_img"
                                    class="form-label  @error('main_img') text-danger @enderror">Immagine in
                                    evidenza <span class="text-danger fw-bold">*</span></label>
                                <input type="string" class="form-control @error('main_img') is-invalid @enderror"
                                    id="main_img" name="main_img" value="{{ old('main_img',$apartment->main_img) }}"
                                    maxlength="255" placeholder="https://bollbnb.com/img-default"  required>
                                @error('main_img')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div> --}}
                        </div>
                        <div class="col-12 col-lg-6">
                            {{-- descrizione  --}}
                            <div class="mb-3">
                                <label for="description"
                                    class="form-label  @error('description') text-danger @enderror">Descrizione <span
                                        class="text-danger fw-bold">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                    placeholder="Esempio descrizione; Lorem ipsum dolor sit amet ..." rows="5" maxlength="4096">{{ old('description', $apartment->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12  col-md-6 col-lg-4">
                            {{-- max ospiti --}}
                            <div class="mb-3">
                                <label for="max_guests"
                                    class="form-label  @error('max_guests') text-danger @enderror">Massimo
                                    numero ospiti <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('max_guests') is-invalid @enderror"
                                    id="max_guests" name="max_guests" placeholder="Esempio 5" min="0" max="30"
                                    value="{{ old('max_guests', $apartment->max_guests) }}" required>
                                @error('max_guests')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- stanze da letto --}}
                            <div class="mb-3">
                                <label for="rooms" class="form-label  @error('rooms') text-danger @enderror">Stanze
                                    da letto <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('rooms') is-invalid @enderror"
                                    id="rooms" name="rooms" placeholder="Esempio 2" min="0" max="30"
                                    value="{{ old('rooms', $apartment->rooms) }}" required>
                                @error('rooms')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="col-12 col-md-6 col-lg-4">

                            {{-- letti --}}
                            <div class="mb-3">
                                <label for="beds" class="form-label  @error('beds') text-danger @enderror">Numero
                                    letti
                                    <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('beds') is-invalid @enderror"
                                    id="beds" name="beds" placeholder="Esempio 3" min="0" max="30"
                                    value="{{ old('beds', $apartment->beds) }}" required>
                                @error('beds')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- bagni --}}
                            <div class="mb-3">
                                <label for="baths" class="form-label  @error('baths') text-danger @enderror">Numero
                                    bagni <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('baths') is-invalid @enderror"
                                    id="baths" name="baths" placeholder="Esempio 1" min="0" max="30"
                                    value="{{ old('baths', $apartment->baths) }}" required>
                                @error('baths')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>


                        </div>
                        <div class="col-12  col-md-6 col-lg-4">
                            {{-- mq --}}
                            <div class="mb-3">
                                <label for="mq" class="form-label  @error('mq') text-danger @enderror">Numero mq
                                    <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('mq') is-invalid @enderror"
                                    id="mq" name="mq" placeholder="Esempio 40" min="0"
                                    max="65535" value="{{ old('mq', $apartment->mq) }}" required>
                                @error('mq')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- prezzo a notte --}}
                            <div class="mb-3">
                                <label for="price" class="form-label  @error('price') text-danger @enderror">Prezzo a
                                    notte <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" placeholder="Esempio 55" step="0.01"
                                    min="0.01" max="9999.99" value="{{ old('price', $apartment->price) }}" required>
                                @error('price')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            {{-- address  --}}
                            <div class="mb-3">
                                <label for="address"
                                    class="form-label  @error('address') text-danger @enderror ">Indirizzo
                                    completo <span class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    id="address" name="address"
                                    placeholder="Esempio Via Mario Rossi, 74, Milano (MI), Italia" maxlength="98"
                                    value="{{ old('address', $apartment->address) }}">
                                @error('address')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6 mb-5">
                            {{-- servizi  --}}
                            @if (count($services) > 0)
                                <!-- Button trigger modal -->
                                <button type="button" class="primary-btn" data-bs-toggle="modal"
                                    data-bs-target="#service-model">
                                    Tutti i servizi
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="service-model" tabindex="-1"
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
                                                                        @if (old('services') && is_array(old('services')) && count(old('services')) > 0) {{ in_array($service->id, old('services')) ? 'checked' : '' }} 
                                                                        @elseif($apartment->services->contains($service->id))
                                                                        checked @endif>

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

                        <div class="col-12 d-flex align-items-center">
                            {{-- visibilità online  --}}
                            <div class="form-check me-3">
                                <input class="form-check-input  @error('visible') is-invalid @enderror" type="radio"
                                    name="visible" id="visible1" value="1"
                                    {{ old('visible', $apartment->visible) == 1 ? 'checked' : '' }}>
                                <label class="form-check-label  @error('visible') text-danger @enderror" for="visible1">
                                    Pubblico
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input  @error('visible') is-invalid @enderror" type="radio"
                                    name="visible" id="visible2" value="0"
                                    {{ old('visible', $apartment->visible) == 0 ? 'checked' : '' }}>
                                <label class="form-check-label  @error('visible') text-danger @enderror" for="visible2">
                                    Privato
                                </label>
                            </div>
                            @error('visible')
                                <span class="text-danger fw-bold">{{ $message }}</span>
                            @enderror
                        </div>



                        <div class=" col my-5">
                            <p>
                                I campi contrassegnati con <span class="text-danger fw-bold">*</span> sono <span
                                    class="text-danger fw-bold text-decoration-underline">obbligatori</span>
                            </p>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-success mb-3">Conferma</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5">
            <div class="col">
                <h1>
                    Aggiungi appartamento
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

                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            {{-- titolo  --}}
                            <div class="mb-3">
                                <label for="title" class="form-label  @error('title') text-danger @enderror ">Titolo
                                    <span class="text-danger fw-bold">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    id="title" name="title" placeholder="Esempio titolo" maxlength="98"
                                    value="{{ old('title') }}" required>
                                @error('title')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Immagine principale  --}}
                            <div class="mb-3">
                                <label for="featured_image"
                                    class="form-label  @error('featured_image') text-danger @enderror">Immagine in
                                    evidenzia <span class="text-danger fw-bold">*</span></label>
                                <input type="file" class="form-control @error('featured_image') is-invalid @enderror"
                                    id="featured_image" name="featured_image" {{-- validazione frontend da aggiungere --}} {{-- si usa per i file --}}
                                    accept="image/*">
                                @error('featured_image')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
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
                        <div class="col-12  col-md-6 col-lg-4">
                            {{-- max ospiti --}}
                            <div class="mb-3">
                                <label for="max_guests"
                                    class="form-label  @error('max_guests') text-danger @enderror">Massimo
                                    numero ospiti <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('max_guests') is-invalid @enderror"
                                    id="max_guests" name="max_guests" placeholder="Esempio 5" min="0" max="30"
                                    value="{{ old('max_guests') }}" required>
                                @error('max_guests')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- stanze da letto --}}
                            <div class="mb-3">
                                <label for="max_rooms" class="form-label  @error('max_rooms') text-danger @enderror">Stanze
                                    da
                                    letto <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('max_rooms') is-invalid @enderror"
                                    id="max_rooms" name="max_rooms" placeholder="Esempio 2" min="0" max="30"
                                    value="{{ old('max_rooms') }}" required>
                                @error('max_rooms')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>
                        <div class="col-12 col-md-6 col-lg-4">

                            {{-- letti --}}
                            <div class="mb-3">
                                <label for="max_beds" class="form-label  @error('max_beds') text-danger @enderror">Numero
                                    letti
                                    <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('max_beds') is-invalid @enderror"
                                    id="max_beds" name="max_beds" placeholder="Esempio 3" min="0" max="30"
                                    value="{{ old('max_beds') }}" required>
                                @error('max_beds')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                            {{-- bagni --}}
                            <div class="mb-3">
                                <label for="max_baths" class="form-label  @error('max_baths') text-danger @enderror">Numero
                                    bagni <span class="text-danger fw-bold">*</span></label>
                                <input type="number" class="form-control @error('max_baths') is-invalid @enderror"
                                    id="max_baths" name="max_baths" placeholder="Esempio 1" min="0" max="30"
                                    value="{{ old('max_baths') }}" required>
                                @error('max_baths')
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
                                    max="65535" value="{{ old('mq') }}" required>
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
                                    min="0.01" max="9999.99" value="{{ old('price') }}" required>
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
                                    value="{{ old('address') }}" required>
                                @error('address')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            {{-- servizi  --}}
                            @if (count($services) > 0)
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
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
                                                        class="form-check-label d-block mb-2 @error('technologies') text-danger @enderror">
                                                        Servizi
                                                    </label>
                                                    <ul>
                                                        @foreach ($services as $technology)
                                                            <li>
                                                                <div class="form-check form-check-inline">
                                                                    <input
                                                                        class="form-check-input  @error('technologies') is-invalid @enderror"
                                                                        type="checkbox" id="tech-{{ $technology->id }}"
                                                                        name="technologies[]"
                                                                        value="{{ $technology->id }}"
                                                                        @if (old('technologies') && is_array(old('technologies')) && count(old('technologies')) > 0) {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} @endif>

                                                                    <label
                                                                        class="form-check-label @error('technologies') text-danger @enderror"
                                                                        for="tech-{{ $technology->id }}">{{ $technology->name }}</label>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    @error('technologies')
                                                        <p class="text-danger fw-bold">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Understood</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-6 d-flex align-items-center">
                            {{-- visibilità online  --}}
                            <div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input @error('visible') is-invalid @enderror"
                                        type="checkbox" role="switch" checked id="visible" name="visible"
                                        value="{{ $technology->id }}"
                                        @if (old('visible') && is_array(old('visible')) && count(old('visible')) > 0) {{ in_array($technology->id, old('visible', [])) ? 'checked' : '' }} @endif>

                                    <label class="form-check-label @error('visible') text-danger @enderror"
                                        for="visible">Pubblico</label>
                                </div>
                                @error('visible')
                                    <p class="text-danger fw-bold">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>



                        <div class="my-5">
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

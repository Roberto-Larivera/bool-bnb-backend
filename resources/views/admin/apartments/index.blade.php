@extends('layouts.admin')

@section('title', ' | Appartamenti')
@section('content')
    <div id="apartments_index" class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5">
            <div class="col py-3">
                <h1>
                    <span class="icon-section me-2">
                        <i class="fa-solid fa-building fa-sm"></i>
                    </span>
                    Appartamenti
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

        {{-- Bottone crea: Qui responsive su row --}}
        <div class="row">
            <div class="col">
                <a href="{{ route('admin.apartments.create') }}" class="secondary-btn">
                    <i class="fa-solid fa-plus"></i> Nuovo
                </a>
            </div>
        </div>

        @if (count($apartments) > 0)
            {{-- Tabella: Qui responsive su row --}}
            <div class="row">
                <div class="col">
                    <table class="table my-4 rounded">
                        <thead>
                            <tr>
                                <th scope="col" class="d-none d-md-table-cell b-sxt p-3">
                                    <div class="text-center">
                                        <i class="fa-solid fa-camera"></i>
                                    </div>
                                </th>
                                <th scope="col" class="p-3">
                                    <i class="fa-solid fa-tag"></i>
                                    Titolo
                                </th>
                                <th scope="col" class="d-none d-md-table-cell p-3">
                                    <div class="text-start">
                                        <i class="fa-solid fa-location-dot"></i>
                                        Indirizzo
                                    </div>
                                </th>
                                <th scope="col" class="d-none d-lg-table-cell p-3">
                                    <div class="text-center">
                                        <i class="fa-solid fa-house"></i>
                                        Mq
                                    </div>
                                </th>
                                <th scope="col" class="d-none d-lg-table-cell p-3">
                                    <div class="text-center">
                                        <i class="fa-solid fa-sack-dollar"></i> / notte
                                    </div>
                                </th>
                                <th scope="col" class="p-3">
                                    <div class="text-center">
                                        <i class="fa-solid fa-eye"></i>
                                        Azioni
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        @foreach ($apartments as $index => $apartment)
                            <tbody>
                                <tr>
                                    <td class="d-none d-md-table-cell align-middle">
                                        <div class="apartment-img-container mx-auto">
                                            <img src="{{ $apartment->full_path_main_img }}" alt=" {{ $apartment->title }}"
                                                class="my-img img-fluid rounded">
                                            {{-- <img src="{{ $apartment->main_img }}" alt=" {{ $apartment->title }}" class="img-fluid"> --}}
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        {{ $apartment->title }}
                                    </td>
                                    <td class="d-none d-md-table-cell align-middle">
                                        {{ $apartment->address }}
                                    </td>
                                    <td class="d-none d-lg-table-cell align-middle">
                                        <div class="text-center">
                                            {{ $apartment->mq }}
                                        </div>
                                    </td>
                                    <td class="d-none d-lg-table-cell align-middle">
                                        <div class="text-center">
                                            {{ $apartment->price }}
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <div class="text-center">
                                            <a href="{{ route('admin.apartments.show', $apartment->id) }}"
                                                class="primary-btn">
                                                Dettagli
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
    </div>
@else
    <div class="d-flex justify-content-center gap-3 align-items-center fs-4 mt-5">
        <i class="fa-solid fa-building"></i>
        <p class="m-0">Non hai appartamenti registrati!</p>
    </div>
    @endif

    </div>
@endsection


{{-- Prove per NON ciclare anche modale di delete --}}
{{-- <script>
    function openModal(index) {

        const myInput = document.getElementByAttribute('data-bs-target', 'myModal' + index);
        const myModal = document.getElementByAttribute('query', 'modal-delete');

        myModal.id = 'myModal' + index;
    }

</script> --}}

{{-- <script>
    function openModal(index) {
        const modal = document.getElementById('modal-delete');
        modal.id = 'myModal' + index;
        const myModal = new bootstrap.Modal(modal);
        myModal.show();
    }

    function deleteItem() {
        // Code to delete item goes here
        const modal = document.querySelector('.modal');
        const myModal = new bootstrap.Modal.getInstance(modal);
        myModal.hide();
    }
</script> --}}

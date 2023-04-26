@extends('layouts.admin')

@section('title', ' | Profilo')

@section('content')

    <div class="row row-cols-1 mb-5 my-4 mx-2">
        <div class="col py-3">
            <h1>
                <span class="icon-section me-2">
                    <i class="fa-solid fa-user fa-sm"></i>
                </span>
                Modifica profilo
            </h1>
        </div>

        <div class="col">
            <a href="{{ route('admin.user_datas.index') }}" class="back">
                Torna indietro
                <i class="fa-solid fa-rotate-left"></i>
            </a>
        </div>
    </div>

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

    <div class="container my-5" id="user-edit">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-profile-header text-white">Modifica profilo</div>
                    <div class="card-body">
                        <form action="{{ route('admin.user_datas.update', $user_data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row align-items-center">
                                <div class="col-xl-4 text-center">
                                    <div class="mb-3">
                                        <img src="{{ asset($user_data->profile_img) }}" alt="Foto profilo"
                                            class="rounded-circle img-fluid mb-3" style="max-width: 200px;">
                                        <button type="button" class="primary-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Cambia foto profilo
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Scegli una foto profilo
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div
                                                        class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-6">
                                                        <div class="col">
                                                            <label class="d-block mb-4 h-100">
                                                                <input type="radio" name="profile_img"
                                                                    value="assets/face-profile/green.png">
                                                                <img class="img-fluid img-thumbnail @if($user_data->profile_img == 'assets/face-profile/green.png') selected @endif"
                                                                    src="{{ asset('assets/face-profile/green.png') }}"
                                                                    alt="">
                                                            </label>
                                                        </div>
                                                        <div class="col">
                                                            <label class="d-block mb-4 h-100">
                                                                <input type="radio" name="profile_img"
                                                                    value="assets/face-profile/blue.jpg">
                                                                <img class="img-fluid img-thumbnail @if($user_data->profile_img == 'assets/face-profile/blue.jpg') selected @endif"
                                                                    src="{{ asset('assets/face-profile/blue.jpg') }}"
                                                                    alt="">
                                                            </label>
                                                        </div>
                                                        <div class="col">
                                                            <label class="d-block mb-4 h-100">
                                                                <input type="radio" name="profile_img"
                                                                    value="assets/face-profile/red.jpg">
                                                                <img class="img-fluid img-thumbnail @if($user_data->profile_img == 'assets/face-profile/red.jpg') selected @endif"
                                                                src="{{ asset('assets/face-profile/red.jpg') }}"
                                                                    alt="">
                                                            </label>
                                                        </div>
                                                        <div class="col">
                                                            <label class="d-block mb-4 h-100">
                                                                <input type="radio" name="profile_img"
                                                                    value="assets/face-profile/viola.jpg">
                                                                <img class="img-fluid img-thumbnail @if($user_data->profile_img == 'assets/face-profile/viola.jpg') selected @endif"
                                                                src="{{ asset('assets/face-profile/viola.jpg') }}"
                                                                    alt="">
                                                            </label>
                                                        </div>
                                                        <div class="col">
                                                            <label class="d-block mb-4 h-100">
                                                                <input type="radio" name="profile_img"
                                                                    value="assets/face-profile/celeste.png">
                                                                <img class="img-fluid img-thumbnail @if($user_data->profile_img == 'assets/face-profile/celeste.png') selected @endif"
                                                                src="{{ asset('assets/face-profile/celeste.png') }}">
                                                            </label>
                                                        </div>
                                                        <div class="col">
                                                            <label class="d-block mb-4 h-100">
                                                                <input type="radio" name="profile_img"
                                                                    value="assets/face-profile/yellow.jpg">
                                                                <img class="img-fluid img-thumbnail @if($user_data->profile_img == 'assets/face-profile/yellow.jpg') selected @endif"
                                                                src="{{ asset('assets/face-profile/yellow.jpg') }}" alt="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="primary-btn"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <button type="submit" class="secondary-btn">Conferma</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <h5>Informazioni personali</h5>
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $user_data->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="surname" class="form-label">Cognome</label>
                                        <input type="text" class="form-control" id="surname" name="surname"
                                            value="{{ $user_data->surname }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Data di nascita</label>
                                        <input type="date" class="form-control" id="date_of_birth"
                                            name="date_of_birth" value="{{ $user_data->date_of_birth }}" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="secondary-btn me-1">Aggiorna</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        // Codice js per cambiare e aggiungere la classe selected all'immagine selezionata
        const images = document.querySelectorAll('.img-thumbnail');
        let selectedImage = null;

        images.forEach((image) => {
            image.addEventListener('click', () => {
                images.forEach((img) => img.classList.remove('selected'));
                selectedImage = image;
                selectedImage.classList.add('selected');
            });
        });
    </script>

@endsection

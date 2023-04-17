@extends('layouts.admin')

@section('title', ' | Profilo')

@section('content')

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-profile-header text-white">Modifica profilo</div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.update', $users->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row align-items-center">
                                <div class="col-xl-4 text-center">
                                    <div class="mb-3">
                                        <img src="{{ $users->profile_img }}" alt="Foto profilo"
                                            class="rounded-circle img-fluid mb-3" style="max-width: 200px;">
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
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
                                                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 g-3">
                                                        <div class="col">
                                                            <a href="#" class="d-block mb-4 h-100">
                                                                <img class="img-fluid img-thumbnail"
                                                                    src="https://dummyimage.com/600x400/000/fff"
                                                                    alt="">
                                                                <span class="checkmark"></span>
                                                            </a>
                                                        </div>
                                                        <div class="col">
                                                            <a href="#" class="d-block mb-4 h-100">
                                                                <img class="img-fluid img-thumbnail"
                                                                    src="https://dummyimage.com/600x400/000/fff"
                                                                    alt="">
                                                                <span class="checkmark"></span>
                                                            </a>
                                                        </div>
                                                        <!-- altri elementi immagine -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Annulla</button>
                                                    <button type="submit" class="btn btn-primary">Conferma</button>
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
                                            value="{{ $users->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="surname" class="form-label">Cognome</label>
                                        <input type="text" class="form-control" id="surname" name="surname"
                                            value="{{ $users->surname }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="date_of_birth" class="form-label">Data di nascita</label>
                                        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                            value="{{ $users->date_of_birth }}" required>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1">Aggiorna</button>
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

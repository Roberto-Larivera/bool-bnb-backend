@extends('layouts.admin')

@section('title', ' | Profilo')

@section('content')

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

    <div class="container my-5" id="user-edit">
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
                                                    <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-6">
                                                      <div class="col">
                                                        <label class="d-block mb-4 h-100">
                                                          <input type="radio" name="profile_img" value="https://wallpapers.com/images/hd/netflix-profile-pictures-1000-x-1000-dyrp6bw6adbulg5b.jpg">
                                                          <img class="img-fluid img-thumbnail selected"
                                                            src="https://wallpapers.com/images/hd/netflix-profile-pictures-1000-x-1000-dyrp6bw6adbulg5b.jpg"
                                                            alt="">
                                                        </label>
                                                      </div>
                                                      <div class="col">
                                                        <label class="d-block mb-4 h-100">
                                                          <input type="radio" name="profile_img" value="https://wallpapers.com/images/hd/netflix-profile-pictures-1000-x-1000-88wkdmjrorckekha.jpg">
                                                          <img class="img-fluid img-thumbnail"
                                                            src="https://wallpapers.com/images/hd/netflix-profile-pictures-1000-x-1000-88wkdmjrorckekha.jpg"
                                                            alt="">
                                                        </label>
                                                      </div>
                                                      <div class="col">
                                                        <label class="d-block mb-4 h-100">
                                                          <input type="radio" name="profile_img" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgkg-qvEdE_G0UqfM3gE_PIb7gHIFi1OtAgnSyIWG9Df2ar6BBYVeTM-UULzeWYooBLyc&usqp=CAU">
                                                          <img class="img-fluid img-thumbnail"
                                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTgkg-qvEdE_G0UqfM3gE_PIb7gHIFi1OtAgnSyIWG9Df2ar6BBYVeTM-UULzeWYooBLyc&usqp=CAU"
                                                            alt="">
                                                        </label>
                                                      </div>
                                                      <div class="col">
                                                        <label class="d-block mb-4 h-100">
                                                          <input type="radio" name="profile_img" value="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi8q9hCPqI0SKGM0_WHuuqWtvUPpN43m_Zkpr2M6k6-ty5wq9VNKtOUurNc0UyQ-bQbE0&usqp=CAU">
                                                          <img class="img-fluid img-thumbnail"
                                                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSi8q9hCPqI0SKGM0_WHuuqWtvUPpN43m_Zkpr2M6k6-ty5wq9VNKtOUurNc0UyQ-bQbE0&usqp=CAU"
                                                            alt="">
                                                        </label>
                                                      </div>
                                                      <div class="col">
                                                        <label class="d-block mb-4 h-100">
                                                          <input type="radio" name="profile_img" value="https://i.redd.it/ty54wbejild91.jpg">
                                                          <img class="img-fluid img-thumbnail" src="https://i.redd.it/ty54wbejild91.jpg"alt="">
                                                        </label>
                                                      </div>
                                                      <div class="col">
                                                        <label class="d-block mb-4 h-100">
                                                          <input type="radio" name="profile_img" value="https://pbs.twimg.com/profile_images/1498164684935286785/yAUKiD8V_400x400.jpg">
                                                          <img class="img-fluid img-thumbnail" src="https://pbs.twimg.com/profile_images/1498164684935286785/yAUKiD8V_400x400.jpg"alt="">
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


@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row row-cols-1 mb-5">
        <div class="col py-3">
            <h1>
                I miei messaggi
            </h1>
        </div>

        <div class="col">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
                Torna Indietro
                <i class="fa-solid fa-rotate-left"></i>
            </a>
        </div>
    </div>

    <div class="w-100 d-flex justify-content-end mb-3">
        <!-- Bottone filtri avanzati -->
        <button type="button" class="filter ms-auto p-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            <i class="fa-solid fa-sort me-1"></i> Filtra Messaggi
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Filtra Messaggi
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" class="form-container-small">
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Appartamenti</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="my-btn rounded" data-bs-dismiss="modal">
                    Esci
                </button>
                <button type="submit" class="my-submit rounded">
                    Aggiungi filtri
                </button>
            </div>
        </div>
    </div>

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

    <div class="wrapper-messages bg-white py-5 border rounded-4 px-2 px-md-4">
        @foreach ($messages as $message)
        <hr class="m-2">
        <div class="row message">
            <div class="col-3 col-sm-2 col-md-2 col-lg-1 message-image text-center">
                foto
            </div>
            <div class="d-none d-md-block col-md-2 col-lg-1 col-1 message-name">
                {{ $message->sender_name }} 
            </div>
            <div class="col-9 col-sm-8 col-md-6 col-lg-2 message-object">
                <strong class="d-block d-sm-none">{{ Illuminate\Support\Str::limit($message->object , 18) }}</strong>
                <strong class="d-none d-sm-block">{{ $message->object }}</strong>
            </div>
            <div class="d-none d-lg-block col-md-5 col-lg-7 col-7 message-text">
                <p class="d-none d-lg-block">{{ Illuminate\Support\Str::limit($message->sender_text , 110) }}</p>
            </div>
            <div class="d-none d-sm-block col-sm-1 col-md-1 col-lg-1 col-1 message-time text-end pe-5">
               <strong>{{ date('H:i', strtotime($message->created_at)); }}</strong> 
            </div>
        </div>
        @endforeach
        <hr class="m-2">
    </div>

    


    

</div>
@endsection
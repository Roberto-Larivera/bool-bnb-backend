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

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

    <div class="container-fluid mt-4">
        <div class="row row-cols-1 mb-5 align-items-center">
            {{-- Info appartamento --}}
            <div class="img-container col-6">
                <img class="img-fluid rounded" src="{{ $apartment->main_img }}" alt="{{ $apartment->title }}">
            </div>
            <div class="info-container col-6">
                <h2>
                    {{ $apartment->title }}
                </h2>
                <h4>
                    {{ $apartment->address }}
                </h4>

               <div>
                    Visibile online: {{ $apartment->visible }}
               </div>
                <div>
                    Prezzo: &euro; {{ $apartment->price }}
                </div>
            </div>
        </div>
   
</div>
@endsection
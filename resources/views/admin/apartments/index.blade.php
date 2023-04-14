@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
    <div class="row row-cols-1 mb-5">
        <div class="col py-3">
            <h1>
                I miei appartamenti
            </h1>
        </div>

        <div class="col">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-primary">
                Torna Indietro
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
            <a href="{{ route('admin.apartments.create') }}" class="my-btn rounded">
                <i class="fa-solid fa-plus"></i> Nuovo
            </a>
        </div>
    </div>

    {{-- Tabella: Qui responsive su row --}}
    <div class="row">
        <div class="col">
            <table class="table my-4 rounded">
                <thead>
                  <tr>
                    <th scope="col">
                        Titolo
                    </th>
                    <th scope="col" class="d-none d-md-table-cell">
                        Indirizzo
                    </th>
                    <th scope="col" class="d-none d-lg-table-cell">
                        Mq
                    </th>
                    <th scope="col" class="d-none d-lg-table-cell">
                        Prezzo / notte
                    </th>
                    <th scope="col">
                        Azioni
                    </th>
                  </tr>
                </thead>

                    @foreach ($apartments as $apartment)
                    <tbody>
                        <tr>
                        <td>
                            {{ $apartment->title }}
                        </td>
                        <td class="d-none d-md-table-cell">
                            {{ $apartment->address }}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{ $apartment->mq }}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{ $apartment->price }}
                        </td>
                        <td>
                            <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="my-action rounded">
                                <i class="fa-solid fa-eye my-color-dark"></i>
                            </a>

                            <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="my-action rounded">
                                <i class="fa-solid fa-pen my-color-dark"></i>
                            </a>

                            <a href="{{ route('admin.apartments.destroy', $apartment->id) }}" class="my-action rounded">
                                <i class="fa-solid fa-trash my-color-dark"></i>
                            </a>
                        </td>
                        </tr>
                    </tbody>
                    @endforeach
              </table>
        </div>
    </div>
</div>
@endsection
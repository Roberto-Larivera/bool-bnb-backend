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
            <a href="{{ route('admin.apartments.create') }}" class="btn btn-success">
                Crea nuovo appartamento
            </a>
        </div>
    </div>

    {{-- Tabella: Qui responsive su row --}}
    <div class="row">
        <div class="col">
            <table class="table table-striped my-4 rounded">
                <thead>
                  <tr>
                    <th scope="col">
                        #
                    </th>
                    <th scope="col">
                        Titolo
                    </th>
                    <th scope="col">
                        Indirizzo
                    </th>
                    <th scope="col">
                        Mq
                    </th>
                    <th scope="col">
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
                        <th scope="row">
                            {{ $apartment->id }}
                        </th>
                        <td>
                            {{ $apartment->title }}
                        </td>
                        <td>
                            {{ $apartment->address }}
                        </td>
                        <td>
                            {{ $apartment->mq }}
                        </td>
                        <td>
                            {{ $apartment->price }}
                        </td>
                        <td>
                            <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="btn btn-primary">
                                <i class="fa-solid fa-eye" style="color: #fafcff;"></i>
                            </a>

                            <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-pen" style="color: #fafcff;"></i>
                            </a>

                            <a href="{{ route('admin.apartments.destroy', $apartment->id) }}" class="btn btn-danger">
                                <i class="fa-solid fa-trash" style="color: #fafcff;"></i>
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
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

    @include('admin.partials.errors')
    @include('admin.partials.success')
    @include('admin.partials.warning')

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

                    @foreach ($messages as $message)
                    <tbody>
                        <tr>
                        <td>
                            {{ $message->sender_text }}
                        </td>
                        {{-- <td class="d-none d-md-table-cell">
                            {{ $message->sender_name }}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{ $message->sender_surname }}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{ $message->user_id }}
                        </td> --}}
                        {{-- <td>
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="my-action rounded">
                                <i class="fa-solid fa-eye my-color-dark"></i>
                            </a>

                            <a href="{{ route('admin.messages.edit', $message->id) }}" class="my-action rounded">
                                <i class="fa-solid fa-pen my-color-dark"></i>
                            </a>

                            <a href="{{ route('admin.messages.destroy', $message->id) }}" class="my-action rounded">
                                <i class="fa-solid fa-trash my-color-dark"></i>
                            </a>
                        </td> --}}
                        </tr>
                    </tbody>
                    @endforeach
              </table>
        </div>
    </div>

</div>
@endsection
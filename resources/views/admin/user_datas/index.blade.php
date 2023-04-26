@extends('layouts.admin')

@section('title', ' | Profilo')

@section('content')

    <div class="row row-cols-1 mb-5 my-4 mx-2">
        <div class="col py-3">
            <h1>
                <span class="icon-section me-2">
                    <i class="fa-solid fa-user fa-sm"></i>
                </span>
                Il mio profilo
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


    {{-- SHOW PROFILE INFO --}}
    <div class="container profile-info my-5" id="user-index">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-profile-header text-white">Il mio profilo</div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-xl-4 text-center">
                                <img src="{{ asset($user_data->profile_img) }}" alt="Foto profilo"
                                    class="rounded-circle img-fluid mb-3" style="max-width: 200px;">
                                <h4>{{ $user_data->name }} {{ $user_data->surname }}</h4>
                            </div>
                            <div class="col-xl-8">
                                <h5>Informazioni personali</h5>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Data di nascita:</td>
                                            <td>{{ date('d/m/Y', strtotime($user_data->date_of_birth)) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-auto d-flex gap-3">
                                <a href="{{ route('admin.user_datas.edit', $user_data->id)}}" class="secondary-btn">
                                    <i class="fa-solid fa-pen"></i>
                                    Modifica
                                </a>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="primary-btn logout-btn-user">
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

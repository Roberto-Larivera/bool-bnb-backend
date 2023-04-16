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
              <div class="card-header bg-primary text-white">Il mio profilo</div>
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col-md-4 text-center">
                    <img src="{{ $profile->profile_img }}" alt="Foto profilo" class="rounded-circle img-fluid mb-3" style="max-width: 200px;">
                    <h4>{{ $profile->name }} {{ $profile->surname }}</h4>
                  </div>
                  <div class="col-md-8">
                    <h5>Informazioni personali</h5>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td>Email:</td>
                          <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                          <td>Data di nascita:</td>
                          <td>{{ date('Y/m/d', strtotime($profile->date_of_birth)) }}</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

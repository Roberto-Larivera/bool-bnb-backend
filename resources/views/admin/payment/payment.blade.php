@extends('layouts.admin')

@section('title', ' | Modifica')
@section('head')
    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('content')
    <div id="apartments_create" class="container-fluid my-5">
        <div class="row row-cols-1 mb-5">
            <div class="col">
                <h1>
                    <span class="icon-section me-2">
                        <i class="fa-solid fa-building fa-sm"></i>
                    </span>
                    Pagamento
                </h1>

            </div>
            <div class="col">
                <a href="{{ route('admin.apartments.index') }}" class="back">
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

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        @csrf
                        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
                        <div style="display: flex;justify-content: center;align-items: center; color: white">
                            <a id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    @section('javascript')

    <script>
        // prendiamo il button
        var button = document.querySelector('#submit-button');
        var instance; // define instance variable outside the function
    
        // controllo carta + pagamento
        braintree.dropin.create({
            authorization: '{{ $token }}',
            container: '#dropin-container'
        }, function(createErr, dropinInstance) {
            if (createErr) {
                console.error(createErr);
                return;
            }
            instance = dropinInstance; // assign dropinInstance to instance variable
            button.addEventListener('click', function() {
                instance.requestPaymentMethod(function(err, payload) {
                    $.get('{{ route('admin.payment.process') }}', {
                        payload
                    }, function(response) {
                        if (response.success) {
                            alert('Payment successful!');
                        } else {
                            alert('Payment failed');
                        }
                    }, 'json');
                });
            });
        });
    </script>
    


    @endsection

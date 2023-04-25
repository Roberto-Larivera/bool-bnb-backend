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
            <div class="col-6 offset-3">
                @csrf
                {{-- Stile fornito da Braintree --}}
                <div id="dropin-container">

                </div>
                <div class="info-payment text-center">
                    <a id="submit-button" class="btn btn-sm btn-success">
                        Procedi al pagamento
                    </a>
                </div>
            </div>
        </div>

        {{-- toast al pagamento --}}
        <div class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
              <div class="toast-body">
                    Pagamento fallito
              </div>
              <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>

@endsection



@section('javascript')
    <script>
        // prendiamo il button
        var button = document.querySelector('#submit-button');
        var instance; // define instance variable outside the function
        const urlParams = new URLSearchParams(window.location.search);
        let sponsor = urlParams.get('sponsor_id');
        let apartment = urlParams.get('apartment_id');
    
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
                        payload,
                        sponsor,
                        apartment

                    }, function(response) {
                        if (response.success) {
                            // messaggio di successo
                            
                        }
                        else {

                        }
                    }, 'json');
                });
            });
        });

    </script>
@endsection

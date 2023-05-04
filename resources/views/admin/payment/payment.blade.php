@extends('layouts.admin')

@section('title', ' | Modifica')
@section('head')
    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection

@section('content')
    <div id="payment_container" class="container-fluid my-5">
        <div class="row">
            <div class="col position-relative">
                <div id="isSent" class="text-bg-success message success d-none align-items-center justify-content-center">
                    <i class="fa-solid fa-circle-check fa-fade"></i>
                    <span class="ms-2 me-4">Pagamento effettuato con successo! <br> Sarai renderizzato tra 5 secondi...</span>
                </div>
                <div id="isSentNone" class="text-bg-danger message danger d-none align-items-center justify-content-center">
                    <i class="fa-solid fa-circle-check fa-fade"></i>
                    <span class="ms-2 me-4">Pagamento fallito!</span>
                </div>
            </div>
        </div>

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
                {{-- <div class="info-payment text-center">
                    <a id="submit-carta" class="btn btn-sm btn-success">
                        Aggiungi carta
                    </a>
                </div> --}}
                <div class="info-payment text-center">
                    <a id="submit-button" class="btn btn-sm btn-success">
                        Procedi al pagamento
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection



@section('javascript')
    <script>
        // prendiamo il button
        // var buttonCarta = document.querySelector('#submit-carta');
        var button = document.querySelector('#submit-button');

        var instance; // define instance variable outside the function
        const urlParams = new URLSearchParams(window.location.search);
        let sponsor = urlParams.get('sponsor_id');
        let apartment = urlParams.get('apartment_id');

        // controllo carta
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
                            $('#isSent').removeClass('d-none').addClass('d-flex');
                            $('#submit-button').addClass('d-none');
                            setTimeout(function() {
                                $('#isSent').removeClass('d-flex').addClass(
                                    'd-none');
                            }, 3000);
                            setTimeout(function() {
                                window.location.replace('/admin/dashboard');
                            }, 5000);

                            // window.location.replace('{{ route('admin.sponsors.index') }}'); 
                            // alert('Pagamento avvenuto con successo!');

                        } else {
                            $('#isSentNone').removeClass('d-none').addClass('d-flex');

                            setTimeout(function() {
                                $('#isSentNone').removeClass('d-flex').addClass(
                                    'd-none');
                            }, 5000);
                            

                            alert('Pagamento fallito. Riprova');
                        }
                    }, 'json');
                });
            });
        });
    </script>
@endsection

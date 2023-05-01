<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment-Success</title>
</head>

<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .h-100 {
        height: 300px;
    }

    .d-flex {
        display: flex
    }

    .align-items-center {
        align-items: center;
        justify-content: center
    }

    .wrapper {
        background-color: #f4f4f4;
        padding: 20px;
    }

    .container {
        background-color: #ffffff;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 10px;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 10px;
    }

    p {
        margin-top: 0;
        margin-bottom: 10px;
        word-break: break-all;
        white-space: normal;
    }

    a,
    .color {
        color: #FF385C;
    }

    .header {
        background-color: #FF385C;
        color: #ffffff;
        padding: 10px;
        border-radius: 10px 10px 0 0;
    }

    .header h1 {
        font-size: 28px;
        margin-top: 10px;
        margin-bottom: 0;
    }

    .body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        font-size: large;
    }

    .footer {
        background-color: #f4f4f4;
        padding: 10px;
        border-radius: 0 0 10px 10px;
    }

    .footer p {
        font-size: 12px;
        text-align: center;
        margin-top: 0;
    }

    ul {
        display: flex;
        flex-direction: column;
        padding: 0;
        list-style: none;
    }
</style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <h1>Informazioni appartamenti</h1>
            </div>
            <a class="logo_site first-letter:navbar-brand d-flex  align-items-center h-100" href="{{ url('login') }}">
                <div class=" h-100">
                    <img class="h-100" src="{{ asset('assets/logo.svg') }}">
                </div>
            </a>
            <h1 class="color">
                Pagamento effettuato con successo
            </h1>
            <div class="body">
                <p>Salve,</p>
                <p>Abbiamo ricevuto una disposizione di pagamento dal seguente utente:</p>
                <ul>
                    <li><strong>Nome:</strong> {{ $data['name'] }}</li>
                    <li><strong>Cognome:</strong> {{ $data['surname'] }}</li>
                    <li><strong>Oggetto:</strong> {{ $data['object'] }}</li>
                    <li><strong>Email:</strong> {{ $data['email'] }}</li>
                </ul>
                <p><strong>Testo del messaggio:</strong></p>
                <p>{{ $data['message'] }}</p>
            </div>
            <div class="footer">
                <p>Questa email è stata generata automaticamente. Non rispondere a questo messaggio.</p>
            </div>
        </div>
    </div>
</body>

</html>

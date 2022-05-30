<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BoolPress</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>
    <div class="guest-contact-container">
        <div class="col-6 mx-auto">
            <h1> Contact us: </h1>
            <form class="form-group" action="{{ route("guest.storeContact") }}" method="post">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="senderName">Inserisci il tuo nome</label>
                    <input class="form-control" type="text" name="senderName" id="senderName">
                </div>

                <div class="mb-3">
                    <label for="senderEmail">Inserisci la mail alla quale desideri essere ricontattato</label>
                    <input class="form-control" type="email" name="senderEmail" id="senderEmail">
                </div>

                <div class="mb-3">
                    <label for="senderMessage">Inserisci il corpo del messaggio che vuoi inviare</label>
                    <textarea class="form-control" id="senderMessage" type="text" value="" name="senderMessage" rows="7"></textarea>
                </div>

                <button class="btn btn-lg btn-primary" type="submit">Invia il messaggio</button>
            </form>
        </div>
        {{-- <div id="root"></div> --}}
    </div>
    <script src="{{ asset('js/front.js') }}"></script>

</body>

</html>

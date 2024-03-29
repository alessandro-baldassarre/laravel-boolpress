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
    <div class="guest-home-container">
        @if (session('message'))
                <div class="col-12 alert alert-succes" role="alert">
                    {{ session('message') }}
                </div>
        @endif
        <div id="root"></div>
    </div>
    <script src="{{ asset('js/front.js') }}"></script>

</body>

</html>

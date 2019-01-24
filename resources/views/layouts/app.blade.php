<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$page_title or 'Страница'}}</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/style.css') }}?{{ time() }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}?{{ time() }}"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">

            @yield('content')

        </div>
    </div>
</div>
</body>
</html>
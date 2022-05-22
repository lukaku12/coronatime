<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>
    <link rel="icon" href="{{ URL::asset('assets/icon.png') }}" type="image/x-icon">
    <title>{{ __('ui.coronatime') }}</title>
</head>
<body class="w-screen h-screen flex flex-col justify-center items-center overflow-x-hidden">
{{ $slot }}
</body>
</html>

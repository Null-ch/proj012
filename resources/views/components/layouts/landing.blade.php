<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page['meta']['title'] }}</title>
    <meta name="description" content="{{ $page['meta']['description'] }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('icons/favicon.svg') }}">
    <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="landing-body">
    @if (session('request_form_success'))
        <div class="toast-stack" data-toast-stack>
            <div class="toast toast--success" role="status" data-toast>
                <span>{{ session('request_form_success') }}</span>
                <button type="button" class="toast__close" aria-label="Закрыть уведомление" data-toast-close>&times;</button>
            </div>
        </div>
    @endif

    {{ $slot }}
    <button type="button" class="back-to-top" aria-label="Наверх" data-back-to-top>Наверх</button>
</body>
</html>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page['meta']['title'] }}</title>
    <meta name="description" content="{{ $page['meta']['description'] }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="landing-body">
    {{ $slot }}
</body>
</html>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $page['meta']['title'] }}</title>
    <meta name="description" content="{{ $page['meta']['description'] }}">
    <meta name="robots" content="{{ $page['meta']['robots'] ?? 'index,follow' }}">
    <link rel="canonical" href="{{ $page['meta']['canonical'] ?? url()->current() }}">
    <meta property="og:type" content="{{ $page['meta']['og_type'] ?? 'website' }}">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:site_name" content="АО «Гиропланы-ПАТ»">
    <meta property="og:title" content="{{ $page['meta']['og_title'] ?? $page['meta']['title'] }}">
    <meta property="og:description" content="{{ $page['meta']['og_description'] ?? $page['meta']['description'] }}">
    <meta property="og:url" content="{{ $page['meta']['canonical'] ?? url()->current() }}">
    @if (!empty($page['meta']['og_image'] ?? null))
        <meta property="og:image" content="{{ asset($page['meta']['og_image']) }}">
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page['meta']['og_title'] ?? $page['meta']['title'] }}">
    <meta name="twitter:description" content="{{ $page['meta']['og_description'] ?? $page['meta']['description'] }}">
    @if (!empty($page['meta']['og_image'] ?? null))
        <meta name="twitter:image" content="{{ asset($page['meta']['og_image']) }}">
    @endif
    <link rel="sitemap" type="application/xml" title="Sitemap" href="{{ route('seo.sitemap') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('icons/favicon.svg') }}">
    <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}">
    @if (!empty($page['meta']['json_ld'] ?? null))
        <script type="application/ld+json">
            {!! json_encode($page['meta']['json_ld'], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endif
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

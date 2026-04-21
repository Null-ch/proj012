<x-layouts.landing :page="$page">
    @include('landing.partials.header', ['navigation' => $page['navigation'], 'contact' => $page['contact']])

    <main>
        @include('landing.partials.hero', ['hero' => $page['hero']])
        @include('landing.partials.about', ['about' => $page['about']])
        @include('landing.partials.quality', ['text' => $page['services_intro'] ?? null, 'stats' => $page['quality_stats'] ?? []])
        @include('landing.partials.services', ['services' => $page['services']])
        @include('landing.partials.portfolio', ['portfolio' => $page['portfolio'], 'portfolioLink' => $page['portfolio_link'] ?? null])
        @include('landing.partials.clients', ['clients' => $page['clients'] ?? null])
        @include('landing.partials.request-form', ['form' => $page['request_form']])
    </main>

    @include('landing.partials.footer', ['contact' => $page['contact'], 'navigation' => $page['navigation']])
</x-layouts.landing>

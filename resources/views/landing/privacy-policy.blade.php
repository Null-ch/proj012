<x-layouts.landing :page="$page">
    @include('landing.partials.header', ['navigation' => $page['navigation'], 'contact' => $page['contact']])

    <main>
        <section class="section privacy-policy-page">
            <div class="container">
                <div class="privacy-policy-page__toolbar">
                    <a class="btn btn--primary" href="{{ route('landing.privacy-policy.download') }}" download>
                        Скачать документ
                    </a>
                </div>
                @include('landing.partials.privacy-policy-content')
            </div>
        </section>
    </main>

    @include('landing.partials.footer', ['contact' => $page['contact'], 'navigation' => $page['navigation']])
</x-layouts.landing>

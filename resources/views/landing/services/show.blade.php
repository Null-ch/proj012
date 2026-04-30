<x-layouts.landing :page="$page">
    @include('landing.partials.header', ['navigation' => $page['navigation'], 'contact' => $page['contact']])

    <main>
        <section class="section">
            <div class="container">
                <a class="btn btn--ghost details-back" href="{{ route('landing.home') }}#services">← Вернуться к услугам</a>
                <article class="service-details">
                    <img
                        class="service-details__image"
                        src="{{ asset($service['image']) }}"
                        alt="{{ $service['title'] ?? 'Услуга' }}"
                        loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';"
                    >
                    <div class="service-details__image-fallback" style="display:none;">Изображение услуги</div>
                    <div>
                        <h1 class="service-details__title">@if (isset($service['title'])) {{ $service['title'] }} @endif</h1>
                        <p class="service-details__text">@if (isset($service['details'])) {{ $service['details'] }} @endif</p>
                    </div>
                </article>
            </div>
        </section>
    </main>

    @include('landing.partials.footer', ['contact' => $page['contact'], 'navigation' => $page['navigation']])
</x-layouts.landing>

<x-layouts.landing :page="$page">
    @include('landing.partials.header', ['navigation' => $page['navigation'], 'contact' => $page['contact']])

    <main>
        <section class="section" id="works-gallery">
            <div class="container">
                <div class="gallery-page__header">
                    <h1 class="section-heading">Галерея работ</h1>
                    <a class="btn btn--primary" href="{{ route('landing.home') }}#portfolio">На главную</a>
                </div>

                <div class="grid grid--gallery">
                    @foreach($works as $item)
                        <article class="card card--portfolio">
                            <button
                                class="gallery-card__open"
                                type="button"
                                data-gallery-image
                                data-image-src="{{ asset($item['image']) }}"
                                data-image-alt="{{ $item['title'] ?? 'Изображение работы' }}"
                                aria-label="Открыть изображение в полном экране"
                            >
                                <img
                                    class="portfolio-card__image"
                                    src="{{ asset($item['image']) }}"
                                    alt="{{ $item['title'] ?? 'Изображение работы' }}"
                                    loading="lazy"
                                    onerror="this.style.display='none'; this.closest('.gallery-card__open').nextElementSibling.style.display='grid';"
                                >
                            </button>
                            <div class="placeholder" style="display:none;">Изображение работы</div>
                            @if(isset($item['title']))
                                <h3>{{ $item['title'] }}</h3>
                            @endif
                            @if(isset($item['subtitle']))
                                <p>{{ $item['subtitle'] }}</p>
                            @endif
                        </article>
                    @endforeach
                </div>

                <div class="gallery-lightbox" data-gallery-lightbox hidden>
                    <button class="gallery-lightbox__close" type="button" data-gallery-close aria-label="Закрыть">
                        &times;
                    </button>
                    <img class="gallery-lightbox__image" src="" alt="" data-gallery-lightbox-image>
                </div>
            </div>
        </section>
    </main>

    @include('landing.partials.footer', ['contact' => $page['contact'], 'navigation' => $page['navigation']])
</x-layouts.landing>

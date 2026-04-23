<section class="section portfolio-section" id="portfolio">
    <div class="container">
        <div class="portfolio__header">
            <h2 class="section-heading">Наши работы</h2>
        </div>
        <div class="grid grid--3">
            @foreach($portfolio as $item)
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
                            @if (isset($item['title'])): alt="{{ $item['title'] }}" @endif
                            @if (isset($item['subtitle'])): subtitle="{{ $item['subtitle'] }}" @endif
                            loading="lazy"
                            onerror="this.style.display='none'; this.closest('.gallery-card__open').nextElementSibling.style.display='grid';"
                        >
                    </button>
                    <div class="placeholder" style="display:none;">Изображение работы</div>
                    @if (isset($item['title'])): <h3>{{ $item['title'] }}</h3> @endif
                    @if (isset($item['subtitle'])): <p>{{ $item['subtitle'] }}</p> @endif
                    @if (isset($item['subtitle'])): <p>{{ $item['subtitle'] }}</p> @endif
                </article>
            @endforeach
        </div>
        <div class="gallery-lightbox" data-gallery-lightbox hidden>
            <button class="gallery-lightbox__close" type="button" data-gallery-close aria-label="Закрыть">
                &times;
            </button>
            <img class="gallery-lightbox__image" src="" alt="" data-gallery-lightbox-image>
        </div>
        @if(!empty($portfolioLink))
            <div class="portfolio__more">
                <a class="btn btn--primary portfolio__more-btn" href="{{ $portfolioLink['href'] }}">{{ $portfolioLink['label'] }}</a>
            </div>
        @endif
    </div>
</section>

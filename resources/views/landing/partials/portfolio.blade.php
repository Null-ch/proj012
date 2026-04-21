<section class="section portfolio-section" id="portfolio">
    <div class="container">
        <div class="portfolio__header">
            <h2 class="section-heading">Наши работы</h2>
        </div>
        <div class="grid grid--3">
            @foreach($portfolio as $item)
                <article class="card card--portfolio">
                    <img
                        class="portfolio-card__image"
                        src="{{ asset($item['image']) }}"
                        @if (isset($item['title'])): alt="{{ $item['title'] }}" @endif
                        @if (isset($item['subtitle'])): subtitle="{{ $item['subtitle'] }}" @endif
                        loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='grid';"
                    >
                    <div class="placeholder" style="display:none;">Изображение работы</div>
                    @if (isset($item['title'])): <h3>{{ $item['title'] }}</h3> @endif
                    @if (isset($item['subtitle'])): <p>{{ $item['subtitle'] }}</p> @endif
                    @if (isset($item['subtitle'])): <p>{{ $item['subtitle'] }}</p> @endif
                </article>
            @endforeach
        </div>
        @if(!empty($portfolioLink))
            <div class="portfolio__more">
                <a class="btn btn--primary portfolio__more-btn" href="{{ $portfolioLink['href'] }}">{{ $portfolioLink['label'] }}</a>
            </div>
        @endif
    </div>
</section>

<section class="section section--alt services-section" id="services">
    <div class="container">
        <div class="services__header">
            <h2 class="section-heading">Наши услуги</h2>
            <div class="services__controls">
                <button class="slider-btn" type="button" data-services-prev aria-label="Предыдущие услуги">&larr;</button>
                <button class="slider-btn" type="button" data-services-next aria-label="Следующие услуги">&rarr;</button>
            </div>
        </div>
        <div class="services-slider" data-services-slider>
            @foreach($services as $service)
                <article class="card service-card">
                    <img
                        class="service-card__image"
                        src="{{ asset($service['image']) }}"
                        alt="{{ $service['title'] ?? $service['description'] }}"
                        loading="lazy"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                    >
                    <div class="service-card__fallback" style="display:none;">Изображение услуги</div>
                    <p>{{ $service['description'] }}</p>
                    <!-- <button
                        class="btn btn--primary service-card__link"
                        type="button"
                        data-service-open
                        data-service-title="{{ $service['title'] ?? 'Услуга' }}"
                        data-service-details="{{ $service['details'] ?? $service['description'] }}"
                        data-service-image="{{ asset($service['image']) }}"
                    >
                        Подробнее
                    </button> -->
                </article>
            @endforeach
        </div>
    </div>

    <div class="service-modal" data-service-modal hidden>
        <div class="service-modal__content">
            <button class="service-modal__close" type="button" data-service-close aria-label="Закрыть">&times;</button>
            <img class="service-modal__image" src="" alt="" data-service-modal-image>
            <h3 class="service-modal__title" data-service-modal-title></h3>
            <p class="service-modal__text" data-service-modal-text></p>
        </div>
    </div>
</section>

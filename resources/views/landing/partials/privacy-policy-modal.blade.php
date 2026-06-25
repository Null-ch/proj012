<div class="privacy-policy-modal" data-privacy-policy-modal hidden>
    <div class="privacy-policy-modal__content" role="dialog" aria-modal="true" aria-labelledby="privacy-policy-modal-title">
        <div class="privacy-policy-modal__header">
            <h2 class="privacy-policy-modal__title" id="privacy-policy-modal-title">Политика обработки персональных данных</h2>
            <button class="privacy-policy-modal__close" type="button" data-privacy-policy-close aria-label="Закрыть">&times;</button>
        </div>
        <div class="privacy-policy-modal__body">
            @include('landing.partials.privacy-policy-content')
        </div>
        <div class="privacy-policy-modal__footer">
            <a class="btn btn--primary privacy-policy-modal__download" href="{{ route('landing.privacy-policy.download') }}" download>
                Скачать документ
            </a>
        </div>
    </div>
</div>

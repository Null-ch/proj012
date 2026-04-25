<section class="section section--alt request-section" id="request">
    <div class="container">
        <div class="request request--compact">
            <div class="request__intro">
                <h2 class="section-heading">{{ $form['title'] }}</h2>
                <p>{{ $form['description'] }}</p>
            </div>

            <form class="request__form" method="post" action="{{ route('landing.request.send') }}" data-request-form>
                @csrf
                <input type="text" name="website" tabindex="-1" autocomplete="off" style="display:none !important;" aria-hidden="true">
                <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}" required>
                <input type="tel" name="phone" placeholder="Телефон" value="{{ old('phone') }}" required>
                <textarea name="question" placeholder="Ваш вопрос" rows="4" required>{{ old('question') }}</textarea>
                <label class="request__consent">
                    <input type="checkbox" name="consent" @checked(old('consent')) required>
                    Согласен на обработку персональных данных
                </label>
                <div class="request__alert request__alert--success" data-request-success hidden>
                    <span data-request-success-text></span>
                    <button class="request__alert-close" type="button" aria-label="Закрыть уведомление" data-request-success-close>&times;</button>
                </div>
                <div class="request__alert request__alert--error" data-request-error hidden>
                    <span data-request-error-text></span>
                    <button class="request__alert-close" type="button" aria-label="Закрыть уведомление" data-request-error-close>&times;</button>
                </div>
                @if ($errors->any())
                    <p class="request__alert request__alert--error">{{ $errors->first() }}</p>
                @endif
                <button class="btn btn--primary request__submit" type="submit" data-request-submit>Отправить</button>
            </form>
        </div>
    </div>
</section>

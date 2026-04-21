<section class="section section--alt request-section" id="request">
    <div class="container">
        <div class="request request--compact">
            <div class="request__intro">
                <h2 class="section-heading">{{ $form['title'] }}</h2>
                <p>{{ $form['description'] }}</p>
            </div>

            <form class="request__form" method="post" action="{{ route('landing.request.send') }}">
                @csrf
                <input type="text" name="name" placeholder="Имя" value="{{ old('name') }}" required>
                <input type="tel" name="phone" placeholder="Телефон" value="{{ old('phone') }}" required>
                <textarea name="question" placeholder="Ваш вопрос" rows="4" required>{{ old('question') }}</textarea>
                <label class="request__consent">
                    <input type="checkbox" name="consent" @checked(old('consent')) required>
                    Согласен на обработку персональных данных
                </label>
                @if ($errors->any())
                    <p class="request__alert request__alert--error">{{ $errors->first() }}</p>
                @endif
                <button class="btn btn--primary request__submit" type="submit">Отправить</button>
            </form>
        </div>
    </div>
</section>

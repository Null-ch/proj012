<section class="section section--alt request-section" id="request">
    <div class="container">
        <div class="request request--compact">
            <div class="request__intro">
                <h2 class="section-heading">{{ $form['title'] }}</h2>
                <p>{{ $form['description'] }}</p>
            </div>

            <form class="request__form" method="post" action="#">
                <input type="text" name="name" placeholder="Имя" required>
                <input type="tel" name="phone" placeholder="Телефон" required>
                <textarea name="question" placeholder="Ваш вопрос" rows="4" required></textarea>
                <label class="request__consent">
                    <input type="checkbox" name="consent" required>
                    Согласен на обработку персональных данных
                </label>
                <button class="btn btn--primary request__submit" type="submit">Отправить</button>
            </form>
        </div>
    </div>
</section>

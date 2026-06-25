<x-layouts.landing :page="$page">
    @include('landing.partials.header', ['navigation' => $page['navigation'], 'contact' => $page['contact']])

    <main>
        <section class="section section--alt privacy-policy-page">
            <div class="container">
                <article class="privacy-policy__paper">
                    <header class="privacy-policy__doc-header">
                        <p class="privacy-policy__doc-label">Официальный документ</p>
                        <h1 class="privacy-policy__doc-title">Политика обработки персональных данных</h1>
                        <p class="privacy-policy__doc-meta">
                            АО «ГИРОПЛАНЫ - ПЕРЕДОВЫЕ АВИАЦИОННЫЕ ТЕХНОЛОГИИ» · в соответствии с Федеральным законом № 152-ФЗ
                        </p>
                    </header>

                    <div class="privacy-policy__body">
                        @include('landing.partials.privacy-policy-content')
                    </div>

                    <footer class="privacy-policy__actions">
                        @include('landing.partials.privacy-policy-download')
                    </footer>
                </article>
            </div>
        </section>
    </main>

    @include('landing.partials.footer', ['contact' => $page['contact'], 'navigation' => $page['navigation']])
</x-layouts.landing>

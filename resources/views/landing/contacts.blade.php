<x-layouts.landing :page="$page">
    @include('landing.partials.header', ['navigation' => $page['navigation'], 'contact' => $page['contact']])

    <main>
        <section class="section">
            <div class="container">
                <h1 class="section-heading section-title--spaced">Контактные данные</h1>

                <div class="contacts-page__top">
                    <div class="contacts-page__info">
                        <h3>Адрес:</h3>
                        <p>{{ $page['contact']['address'] }}</p>

                        <h3>Телефон:</h3>
                        <p>{{ $page['contact']['primary_phone'] }}</p>
                        @if(isset($page['contact']['secondary_phone']))<p>{{ $page['contact']['secondary_phone'] }}</p>@endif

                        
                        @if(isset($page['contact']['fax']))
                        <h3>Факс:</h3>
                        <p>{{ $page['contact']['fax'] }}</p>@endif

                        
                        @if(isset($page['contact']['email']))
                        <h3>Email:</h3>
                        <p>{{ $page['contact']['email'] }}</p>@endif

                        <div class="contacts-page__company">
                            <h3>Реквизиты организации:</h3>
                            @foreach($page['contact']['company_details'] as $line)
                                <p>{{ $line }}</p>
                            @endforeach
                        </div>
                    </div>

                    <div class="contacts-page__map">
                        <iframe
                            src="https://yandex.ru/map-widget/v1/?ll=38.648921%2C55.319098&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgo0Mzk4MzQwMjMwEosB0KDQvtGB0YHQuNGPLCDQnNC-0YHQutC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwg0LPQvtGA0L7QtNGB0LrQvtC5INC-0LrRgNGD0LMg0JLQvtGB0LrRgNC10YHQtdC90YHQuiwg0YHQtdC70L4g0J3QvtCy0LvRj9C90YHQutC-0LUsIDHQkCIKDWKYGkIV7UZdQg%2C%2C&z=20"
                            width="100%"
                            height="380"
                            frameborder="0"
                            allowfullscreen="true"
                            loading="lazy"
                        ></iframe>
                    </div>
                </div>

            </div>
        </section>
    </main>

    @include('landing.partials.footer', ['contact' => $page['contact'], 'navigation' => $page['navigation']])
</x-layouts.landing>

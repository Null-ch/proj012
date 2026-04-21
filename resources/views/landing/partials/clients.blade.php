@if(!empty($clients) && !empty($clients['items']))
    <section class="section clients-section">
        <div class="container">
            <div class="clients__header">
                <h2 class="section-heading">{{ $clients['title'] ?? 'Наши клиенты' }}</h2>
            </div>
            <div class="grid grid--3">
                @foreach($clients['items'] as $client)
                    <article class="card client-card">
                        <p class="client-card__text">{{ $client }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>
@endif

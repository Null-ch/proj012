<section class="about section">
    <div class="container">
        <h2 class="section-heading section-title--spaced-lg">{{ $about['title'] }}</h2>
        <p class="lead">{{ $about['text'] }}</p>
        <div class="about__sections">
            @foreach($about['highlights'] as $highlight)
                <article class="card about__block">
                    <h3>{{ $highlight['title'] }}</h3>
                    @if(!empty($highlight['items']))
                        <ul class="about__list">
                            @foreach($highlight['items'] as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    @elseif(!empty($highlight['description']))
                        <ul class="about__list">
                            <li>{{ $highlight['description'] }}</li>
                        </ul>
                    @endif
                    @if(!empty($highlight['items']) && !empty($highlight['description']))
                        <p class="about__note">{{ $highlight['description'] }}</p>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>

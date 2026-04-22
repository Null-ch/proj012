<section class="hero" id="about">
    <div class="container">
        <span class="hero__badge">{{ $hero['badge'] }}</span>
        <h1>{{ $hero['title'] }}</h1>
        <p>{!! nl2br(e($hero['description'])) !!}</p>
        <div class="hero__actions">
            <a class="btn btn--primary" href="{{ $hero['cta_primary']['href'] }}">{{ $hero['cta_primary']['label'] }}</a>
            <a class="btn btn--ghost" href="{{ $hero['cta_secondary']['href'] }}">{{ $hero['cta_secondary']['label'] }}</a>
        </div>
    </div>
</section>

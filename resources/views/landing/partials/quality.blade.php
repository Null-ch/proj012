<section class="section quality-section">
    <div class="container">
        <div class="quality-block">
            <div class="quality-block__info">
                @if(!empty($text))
                    <p class="lead quality-block__lead">{{ $text }}</p>
                @endif

                @if(!empty($stats))
                    <ul class="quality-checklist">
                        @foreach($stats as $stat)
                            <li class="quality-checklist__item">{{ $stat['label'] }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="quality-video">
                <video class="quality-video__player" controls preload="metadata">
                    <source src="{{ asset('video/IMG_9883.MP4') }}" type="video/mp4">
                    Ваш браузер не поддерживает воспроизведение видео.
                </video>
            </div>
        </div>
    </div>
</section>

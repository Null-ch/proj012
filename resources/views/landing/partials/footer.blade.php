<footer class="footer" id="contacts">
    <div class="container footer__inner">
        <div>
            <h3>Контакты</h3>
            <p>{{ $contact['address'] }}</p>
            <p><a href="tel:{{ preg_replace('/\D+/', '', $contact['primary_phone']) }}">{{ $contact['primary_phone'] }}</a></p>
            @if(isset($contact['email']))
            <p><a href="mailto:{{ $contact['email'] }}">{{ $contact['email'] }}</a></p>
            @endif
        </div>
        <div class="footer__nav">
            @foreach($navigation as $item)
                @php
                    $href = $item['href'];

                    if ($href === '#contacts') {
                        $href = route('landing.contacts');
                    } elseif (str_starts_with($href, '#') && request()->routeIs('landing.contacts')) {
                        $href = route('landing.home') . $href;
                    }
                @endphp
                <a href="{{ $href }}">{{ $item['label'] }}</a>
            @endforeach
        </div>
    </div>
</footer>

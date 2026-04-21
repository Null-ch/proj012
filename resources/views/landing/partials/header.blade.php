<header class="header">
    <div class="container header__inner">
        <a href="{{ route('landing.home') }}" class="logo">АО «Гиропланы - ПАТ»</a>

        <nav class="nav">
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
        </nav>

        <a class="phone" href="tel:{{ preg_replace('/\D+/', '', $contact['primary_phone']) }}">
            {{ $contact['primary_phone'] }}
        </a>
    </div>
</header>

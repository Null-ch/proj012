Новая заявка с формы обратной связи

Служебное уведомление сайта {{ parse_url(config('app.url'), PHP_URL_HOST) ?: config('app.name') }}.

Имя: {{ $name }}
Телефон: {{ $phone }}
Вопрос: {{ $question }}
Дата и время: {{ $sentAt->format('d.m.Y H:i:s') }}
IP: {{ $ipAddress ?? 'Не определен' }}
User-Agent: {{ $userAgent ?? 'Не определен' }}

Это автоматически сформированное служебное письмо.

<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Новая заявка с сайта</title>
</head>
<body style="margin:0; padding:0; background:#f6f8fb; color:#1f2937; font-family:Arial,Helvetica,sans-serif;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background:#f6f8fb; padding:24px 0;">
    <tr>
        <td align="center">
            <table role="presentation" width="640" cellpadding="0" cellspacing="0" style="width:640px; max-width:100%; background:#ffffff; border:1px solid #e5e7eb; border-radius:12px; overflow:hidden;">
                <tr>
                    <td style="padding:20px 24px; background:#111827; color:#ffffff;">
                        <h1 style="margin:0; font-size:20px; line-height:1.3;">Новая заявка с формы обратной связи</h1>
                        <p style="margin:8px 0 0; font-size:13px; color:#d1d5db;">Служебное уведомление сайта {{ parse_url(config('app.url'), PHP_URL_HOST) ?: config('app.name') }}</p>
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px;">
                        <p style="margin:0 0 16px; font-size:14px; line-height:1.5;">
                            Данные по заявке:
                        </p>
                        <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; font-size:14px;">
                            <tr>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb; width:170px; color:#6b7280;">Имя</td>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb;">{{ $name }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb; color:#6b7280;">Телефон</td>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb;">{{ $phone }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb; color:#6b7280;">Вопрос</td>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb; white-space:pre-line;">{{ $question }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb; color:#6b7280;">Дата и время</td>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb;">{{ $sentAt->format('d.m.Y H:i:s') }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb; color:#6b7280;">IP</td>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb;">{{ $ipAddress ?? 'Не определен' }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb; color:#6b7280;">User-Agent</td>
                                <td style="padding:10px 0; border-top:1px solid #e5e7eb;">{{ $userAgent ?? 'Не определен' }}</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="padding:16px 24px; background:#f9fafb; border-top:1px solid #e5e7eb;">
                        <p style="margin:0; font-size:12px; color:#6b7280;">
                            Это автоматически сформированное служебное письмо. Не содержит рекламных вложений и внешних трекеров.
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>

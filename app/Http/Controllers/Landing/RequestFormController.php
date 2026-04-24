<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Mail\LandingRequestReceivedMail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

final class RequestFormController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'question' => ['required', 'string', 'max:2000'],
            'consent' => ['accepted'],
            'website' => ['nullable', 'max:0'],
        ]);

        $recipient = (string) config('landing.request_form.recipient_email', 'info@gyroplanes.tech');

        Mail::to($recipient)->send(new LandingRequestReceivedMail(
            name: (string) $request->string('name'),
            phone: (string) $request->string('phone'),
            question: (string) $request->string('question'),
            ipAddress: $request->ip(),
            userAgent: $request->userAgent(),
            sentAt: now(),
        ));

        $previousUrl = strtok(url()->previous(), '#') ?: route('landing.home');

        return redirect()
            ->to($previousUrl . '#request')
            ->with('request_form_success', 'Заявка успешно отправлена. Мы скоро свяжемся с вами.');
    }
}

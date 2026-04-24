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
            'name' => ['required', 'string', 'min:1', 'max:120', 'regex:/.*\S.*/u'],
            'phone' => ['required', 'string', 'max:40', 'regex:/^\+?\d[\d\s\-\(\)]*$/'],
            'question' => ['required', 'string', 'min:1', 'max:2000', 'regex:/.*\S.*/u'],
            'consent' => ['accepted'],
            'website' => ['nullable', 'max:0'],
        ], [
            'name.required' => 'Пожалуйста, укажите имя.',
            'name.min' => 'Имя должно содержать минимум 1 символ.',
            'name.regex' => 'Имя не может состоять только из пробелов.',
            'phone.required' => 'Пожалуйста, укажите телефон.',
            'phone.regex' => 'Телефон может содержать только цифры, пробелы, скобки, дефис и опциональный "+" в начале.',
            'question.required' => 'Пожалуйста, укажите вопрос.',
            'question.min' => 'Вопрос должен содержать минимум 1 символ.',
            'question.regex' => 'Вопрос не может состоять только из пробелов.',
            'consent.accepted' => 'Необходимо согласие на обработку персональных данных.',
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

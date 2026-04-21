<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class RequestFormController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'question' => ['required', 'string', 'max:2000'],
            'consent' => ['accepted'],
        ]);

        // Пока почта не подключена: имитируем успешную отправку для тестов.
        $previousUrl = strtok(url()->previous(), '#') ?: route('landing.home');

        return redirect()
            ->to($previousUrl . '#request')
            ->with('request_form_success', 'Заявка успешно отправлена. Мы скоро свяжемся с вами.');
    }
}

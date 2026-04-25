<?php

namespace App\Http\Controllers\Landing;

use App\Domain\Landing\DTO\LandingRequestData;
use App\Domain\Landing\Services\LandingRequestSubmissionService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Landing\SendRequestFormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

final class RequestFormController extends Controller
{
    public function __invoke(
        SendRequestFormRequest $request,
        LandingRequestSubmissionService $submissionService,
    ): RedirectResponse|JsonResponse
    {
        $submissionService->submit(LandingRequestData::fromRequest($request));

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Заявка успешно отправлена. Мы скоро свяжемся с вами.',
            ]);
        }

        $previousUrl = strtok(url()->previous(), '#') ?: route('landing.home');

        return redirect()
            ->to($previousUrl . '#request')
            ->with('request_form_success', 'Заявка успешно отправлена. Мы скоро свяжемся с вами.');
    }
}

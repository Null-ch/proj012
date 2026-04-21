<?php

namespace App\Http\Controllers\Landing;

use App\Domain\Landing\LandingContentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class ServicePageController extends Controller
{
    public function __invoke(string $slug, LandingContentRepository $content): View
    {
        $service = $content->getServiceBySlug($slug);

        if ($service === null) {
            throw new NotFoundHttpException();
        }

        return view('landing.services.show', [
            'page' => $content->getPageContent(),
            'service' => $service,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Landing;

use App\Domain\Landing\LandingContentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class WorksGalleryPageController extends Controller
{
    public function __invoke(LandingContentRepository $content): View
    {
        return view('landing.gallery', [
            'page' => $content->getPageContent(),
            'works' => $content->getAllWorks(),
        ]);
    }
}

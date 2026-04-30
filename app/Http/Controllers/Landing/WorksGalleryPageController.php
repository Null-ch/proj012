<?php

namespace App\Http\Controllers\Landing;

use App\Domain\Landing\LandingContentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class WorksGalleryPageController extends Controller
{
    public function __invoke(LandingContentRepository $content): View
    {
        $page = $content->getPageContent();
        $page['meta']['title'] = 'Галерея работ | АО «Гиропланы-ПАТ»';
        $page['meta']['description'] = 'Примеры выполненных работ АО «Гиропланы-ПАТ»: металлообработка, изготовление деталей и производственные проекты.';
        $page['meta']['canonical'] = route('landing.gallery');

        return view('landing.gallery', [
            'page' => $page,
            'works' => $content->getAllWorks(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Landing;

use App\Domain\Landing\LandingContentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class LandingPageController extends Controller
{
    public function __invoke(LandingContentRepository $content): View
    {
        $page = $content->getPageContent();
        $page['portfolio'] = $content->getRandomWorks(4);
        $page['portfolio_link'] = [
            'label' => 'Смотреть больше',
            'href' => route('landing.gallery'),
        ];

        return view('landing.index', [
            'page' => $page,
        ]);
    }
}

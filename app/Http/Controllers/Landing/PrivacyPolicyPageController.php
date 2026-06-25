<?php

namespace App\Http\Controllers\Landing;

use App\Domain\Landing\LandingContentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class PrivacyPolicyPageController extends Controller
{
    public function __invoke(LandingContentRepository $content): View
    {
        $page = $content->getPageContent();
        $page['meta']['title'] = 'Политика обработки персональных данных | АО «Гиропланы-ПАТ»';
        $page['meta']['description'] = 'Политика обработки персональных данных АО «ГИРОПЛАНЫ - ПЕРЕДОВЫЕ АВИАЦИОННЫЕ ТЕХНОЛОГИИ»: порядок сбора, обработки и защиты персональных данных пользователей сайта.';
        $page['meta']['canonical'] = route('landing.privacy-policy');

        return view('landing.privacy-policy', [
            'page' => $page,
        ]);
    }
}

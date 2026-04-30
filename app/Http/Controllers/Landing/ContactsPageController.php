<?php

namespace App\Http\Controllers\Landing;

use App\Domain\Landing\LandingContentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class ContactsPageController extends Controller
{
    public function __invoke(LandingContentRepository $content): View
    {
        $page = $content->getPageContent();
        $page['meta']['title'] = 'Контакты | АО «Гиропланы-ПАТ»';
        $page['meta']['description'] = 'Контакты АО «Гиропланы-ПАТ»: адрес, телефон и данные для связи по металлообработке и производственным проектам.';
        $page['meta']['canonical'] = route('landing.contacts');

        return view('landing.contacts', [
            'page' => $page,
        ]);
    }
}

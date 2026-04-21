<?php

namespace App\Http\Controllers\Landing;

use App\Domain\Landing\LandingContentRepository;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

final class ContactsPageController extends Controller
{
    public function __invoke(LandingContentRepository $content): View
    {
        return view('landing.contacts', [
            'page' => $content->getPageContent(),
        ]);
    }
}

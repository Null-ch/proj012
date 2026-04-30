<?php

namespace App\Http\Controllers;

use App\Domain\Landing\LandingContentRepository;
use Illuminate\Http\Response;

final class SeoController extends Controller
{
    public function sitemap(LandingContentRepository $content): Response
    {
        $urls = [
            route('landing.home'),
            route('landing.contacts'),
            route('landing.gallery'),
        ];

        foreach ($content->getServices() as $service) {
            if (!empty($service['slug'])) {
                $urls[] = route('landing.services.show', ['slug' => $service['slug']]);
            }
        }

        $lastmod = now()->toDateString();
        $xml = view('seo.sitemap', [
            'urls' => array_values(array_unique($urls)),
            'lastmod' => $lastmod,
        ])->render();

        return response($xml, 200)->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        $robots = implode("\n", [
            'User-agent: *',
            'Allow: /',
            'Sitemap: ' . route('seo.sitemap'),
        ]);

        return response($robots, 200)->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}

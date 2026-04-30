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
        $page['meta']['canonical'] = route('landing.home');
        $page['meta']['og_image'] = 'img/main/image-13-4.jpg';
        $page['meta']['json_ld'] = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'АО «Гиропланы-ПАТ»',
            'url' => route('landing.home'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => $page['contact']['address'] ?? '',
                'addressCountry' => 'RU',
            ],
            'telephone' => $page['contact']['primary_phone'] ?? '',
            'makesOffer' => array_map(
                static fn (array $service): array => [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => $service['title'] ?? 'Услуга',
                        'description' => $service['description'] ?? null,
                        'url' => !empty($service['slug']) ? route('landing.services.show', ['slug' => $service['slug']]) : route('landing.home'),
                    ],
                ],
                $content->getServices()
            ),
        ];

        return view('landing.index', [
            'page' => $page,
        ]);
    }
}

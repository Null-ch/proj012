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

        $page = $content->getPageContent();
        $serviceTitle = $service['title'] ?? 'Услуга';
        $serviceDescription = $service['description'] ?? ($service['details'] ?? $page['meta']['description']);
        $serviceUrl = route('landing.services.show', ['slug' => $slug]);
        $page['meta']['title'] = $serviceTitle . ' | АО «Гиропланы-ПАТ»';
        $page['meta']['description'] = $serviceDescription;
        $page['meta']['og_title'] = $serviceTitle;
        $page['meta']['og_description'] = $serviceDescription;
        $page['meta']['canonical'] = $serviceUrl;
        $page['meta']['og_image'] = $service['image'] ?? null;
        $page['meta']['og_type'] = 'article';
        $page['meta']['json_ld'] = [
            '@context' => 'https://schema.org',
            '@type' => 'Service',
            'name' => $serviceTitle,
            'description' => $serviceDescription,
            'provider' => [
                '@type' => 'Organization',
                'name' => 'АО «Гиропланы-ПАТ»',
                'url' => route('landing.home'),
            ],
            'url' => $serviceUrl,
            'areaServed' => 'RU',
        ];

        return view('landing.services.show', [
            'page' => $page,
            'service' => $service,
        ]);
    }
}

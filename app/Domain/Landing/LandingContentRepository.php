<?php

namespace App\Domain\Landing;

use Illuminate\Support\Str;

final class LandingContentRepository
{
    public function getPageContent(): array
    {
        return config('landing');
    }

    public function getServiceBySlug(string $slug): ?array
    {
        foreach ($this->getServices() as $service) {
            if (($service['slug'] ?? null) === $slug) {
                return $service;
            }
        }

        return null;
    }

    public function getServices(): array
    {
        return config('landing.services', []);
    }

    public function getAllWorks(): array
    {
        $paths = glob(public_path('img/works/*.{jpg,jpeg,png,webp,JPG,JPEG,PNG,WEBP}'), GLOB_BRACE) ?: [];

        sort($paths);

        return array_map(
            fn (string $path): array => $this->mapWorkFromPath($path),
            $paths
        );
    }

    public function getRandomWorks(int $limit = 4): array
    {
        $works = $this->getAllWorks();
        shuffle($works);

        return array_slice($works, 0, $limit);
    }

    private function mapWorkFromPath(string $path): array
    {
        $fileName = basename($path);
        $nameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);
        $readableTitle = Str::of($nameWithoutExt)->replace(['_', '-'], ' ')->upper()->value();

        return [
            // 'title' => 'Работа ' . $readableTitle,
            // 'subtitle' => 'Производственный проект',
            'image' => 'img/works/' . $fileName,
        ];
    }
}

<?php

namespace App\Domain\Landing\DTO;

use App\Http\Requests\Landing\SendRequestFormRequest;

final readonly class LandingRequestData
{
    public function __construct(
        public string $name,
        public string $phone,
        public string $question,
        public ?string $ipAddress,
        public ?string $cityHint,
        public ?string $userAgent,
    ) {
    }

    public static function fromRequest(SendRequestFormRequest $request): self
    {
        return new self(
            name: (string) $request->string('name'),
            phone: (string) $request->string('phone'),
            question: (string) $request->string('question'),
            ipAddress: $request->ip(),
            cityHint: self::resolveCityHint($request),
            userAgent: $request->userAgent(),
        );
    }

    private static function resolveCityHint(SendRequestFormRequest $request): ?string
    {
        $cityHeaders = [
            'CF-IPCity',
            'X-Appengine-City',
            'X-City',
            'X-Real-City',
        ];

        foreach ($cityHeaders as $header) {
            $city = trim((string) $request->header($header, ''));
            if ($city !== '') {
                return $city;
            }
        }

        return null;
    }
}

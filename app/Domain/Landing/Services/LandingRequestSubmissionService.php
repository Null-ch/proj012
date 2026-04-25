<?php

namespace App\Domain\Landing\Services;

use App\Domain\Landing\DTO\LandingRequestData;
use App\Mail\LandingRequestReceivedMail;
use Illuminate\Support\Facades\Mail;
use Stevebauman\Location\Facades\Location;
use Throwable;

final class LandingRequestSubmissionService
{
    public function submit(LandingRequestData $data): void
    {
        $recipient = (string) config('landing.request_form.recipient_email', 'info@gyroplanes.tech');

        Mail::to($recipient)->send(new LandingRequestReceivedMail(
            name: $data->name,
            phone: $data->phone,
            question: $data->question,
            ipAddress: $data->ipAddress,
            city: $this->resolveCity($data->ipAddress, $data->cityHint),
            userAgent: $data->userAgent,
            sentAt: now(),
        ));
    }

    private function resolveCity(?string $ipAddress, ?string $cityHint): ?string
    {
        if ($ipAddress) {
            try {
                $position = Location::get($ipAddress);
                $cityFromGeo = trim((string) ($position?->cityName ?? ''));

                if ($cityFromGeo !== '') {
                    return $this->localizeCityName($cityFromGeo);
                }
            } catch (Throwable) {
                // Геолокация может быть временно недоступна.
            }
        }

        if ($cityHint && trim($cityHint) !== '') {
            return $this->localizeCityName($cityHint);
        }

        return null;
    }

    private function localizeCityName(string $city): string
    {
        if (preg_match('/\p{Cyrillic}/u', $city) === 1) {
            return $city;
        }

        if (class_exists(\Transliterator::class)) {
            $transliterator = \Transliterator::create('Latin-Cyrillic');
            $transliterated = $transliterator?->transliterate($city);

            if (is_string($transliterated) && trim($transliterated) !== '') {
                return $transliterated;
            }
        }

        return $city;
    }
}

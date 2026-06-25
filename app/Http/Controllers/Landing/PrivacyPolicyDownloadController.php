<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

final class PrivacyPolicyDownloadController extends Controller
{
    public function __invoke(): BinaryFileResponse
    {
        return response()->download(
            resource_path('content/privacy-policy.docx'),
            'privacy-policy.docx',
            ['Content-Type' => 'text/plain; charset=UTF-8'],
        );
    }
}

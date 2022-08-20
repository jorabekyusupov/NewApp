<?php

namespace App\Services;

use Request;

class LanguageService
{

    public static function getLocale()
    {
        $segmentsURI = explode('/', Request::path());
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], config('app.locales'), true)) {
            return $segmentsURI[0];
        }
        return null;
    }

}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocaleMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);
        if (in_array($locale, config('app.locales'), true)) {
            app()->setLocale($locale);
        }
        else {
            app()->setLocale(app()->getLocale());
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Request;

class LocaleController extends Controller
{
    public function __invoke()
    {
        $data = request()->validate(['lang' => 'required'])['lang'];
        $referer = Redirect::back()->getTargetUrl();
        $segments = explode('/', parse_url($referer, PHP_URL_PATH));
        if (!in_array($data, config('app.locales'), true)) {

            $data = app()->getLocale();
        }
        if (in_array($segments[1], config('app.locales'), true))
        {
            unset($segments[1]);
        }
        array_splice($segments, 1, 0, $data);
        $url = Request::root() . implode("/", $segments);
        if (parse_url($referer, PHP_URL_QUERY)) {
            $url .= '?' . parse_url($referer, PHP_URL_QUERY);
        }
        return redirect($url);

    }
}

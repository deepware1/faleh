<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function __invoke(string $locale)
    {
        if (!in_array(Str::lower($locale), ["ar", "en"])) {
            return back();
        }

        session()->put("locale", $locale);

        return back();
    }
}

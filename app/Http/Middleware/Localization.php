<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->isAdminPage($request)) {
            App::setLocale('en');

            return $next($request);
        }

        if (session()->has("locale")) {
            App::setLocale(session("locale"));
        } else {
            App::setLocale('ar');
        }

        return $next($request);
    }

    private function isAdminPage(Request $request)
    {
        return Str::startsWith($request->path(), 'admin');
    }
}

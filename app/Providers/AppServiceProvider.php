<?php

namespace App\Providers;

use Exception;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::setScriptRoute(function ($handle) {
            $file = $this->getJsAssetsFile();
            return Route::get('/build/assets/' . $file, $handle);
        });
    }

    private function getJsAssetsFile()
    {
        $files = scandir(public_path("build/assets"));
        unset($files[0], $files[1]);

        foreach ($files as $file) {
            if (str_ends_with($file, ".js")) {
                return $file;
            }
        }

        throw new Exception("please build your assets");
    }
}

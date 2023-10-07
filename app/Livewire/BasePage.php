<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class BasePage extends Component
{
    // page attributes
    protected string $viewPath;
    protected string $pageTitle;

    public function render()
    {
        $this->setSeo();

        return view($this->viewPath);
    }

    public function setSeo(): void
    {
        seo()
            ->site(config('app.name'))
            ->title($this->pageTitle)
            ->description("")
            ->rawTag('favicon', '<link rel="icon" type="image/x-icon" href="' . asset('favicon/favicon.ico') . '">')
            ->withUrl()
            ->twitter();
    }
}

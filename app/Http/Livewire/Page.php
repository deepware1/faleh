<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use LaraZeus\Sky\SkyPlugin;
use Livewire\Component;

class Page extends Component
{
    public \LaraZeus\Sky\Models\Post $page;

    public function mount(string $slug): void
    {
        $this->page = SkyPlugin::get()->getModel('Post')::where('slug', $slug)->page()->firstOrFail();
    }

    public function render(): View
    {
        $this->setSeo();

        if ($this->page->status !== 'publish' && !$this->page->require_password) {
            abort_if(!auth()->check(), 404);
            abort_if($this->page->user_id !== auth()->user()->id, 401);
        }

        if ($this->page->require_password && !session()->has($this->page->slug . '-' . $this->page->password)) {
            return view(app('skyTheme') . '.partial.password-form')
                ->with('post', $this->page)
                ->layout(config('zeus.layout'));
        }

        return view(app('skyTheme') . '.page')
            ->with([
                'post' => $this->page,
                'children' => SkyPlugin::get()->getModel('Post')::with('parent')->where('parent_id', $this->page->id)->get(),
            ])
            ->layout(config('zeus.layout'));
    }

    public function setSeo(): void
    {
        seo()
            ->site(config('zeus.site_title', 'Laravel'))
            ->title($this->page->title . ' - ' . config('zeus.site_title'))
            ->description(($this->page->description ?? '') . ' ' . config('zeus.site_description', 'Laravel') . ' ' . config('zeus.site_title'))
            ->rawTag('favicon', '<link rel="icon" type="image/x-icon" href="' . asset('favicon/favicon.ico') . '">')
            ->rawTag('<meta name="theme-color" content="' . config('zeus.site_color') . '" />')
            ->withUrl()
            ->twitter();

        if (!$this->page->getMedia('pages')->isEmpty()) {
            seo()->image($this->page->getFirstMediaUrl('pages'));
        }
    }
}

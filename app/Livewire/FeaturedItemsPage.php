<?php

namespace App\Livewire;

use App\Models\Item;

class FeaturedItemsPage extends BasePage
{
    protected string $pageTitle = "Items";
    protected string $viewPath = "livewire.featured-items-page";

    public $featuredItems;


    public function mount()
    {
        $this->featuredItems = Item::where('section','featured')->take(10)->get();
    }
}

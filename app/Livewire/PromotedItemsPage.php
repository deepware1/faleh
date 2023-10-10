<?php

namespace App\Livewire;

use App\Models\Item;

class PromotedItemsPage extends BasePage
{
    protected string $pageTitle = "Items";
    protected string $viewPath = "livewire.promoted-items-page";

    public $promotedItems;


    public function mount()
    {
        $this->promotedItems = Item::where('section','promoted')->take(10)->get();
    }
}

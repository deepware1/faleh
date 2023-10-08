<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class ItemsPage extends BasePage
{
    protected string $pageTitle = "Items";
    protected string $viewPath = "livewire.items-page";

    // page data
    public $items;

    public function mount()
    {
        $this->items = Item::take(10)->get();
    }
}

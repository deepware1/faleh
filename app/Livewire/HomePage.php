<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Category;

class HomePage extends BasePage
{
    protected string $viewPath = 'livewire.home.index';
    protected string $pageTitle = "Home Page";

    public $categories;
    public $items;

    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->limit(10)->get();
        $this->items = Item::latest()->take(4)->get();
    }
}

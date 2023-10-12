<?php

namespace App\Livewire;

use App\Models\Item;
use App\Models\Category;

class HomePage extends BasePage
{
    protected string $viewPath = 'livewire.home.index';
    protected string $pageTitle = "Home";

    public $categories;
    public $items;
    public $featuredItems;
    public $promotedItems;

    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->limit(10)->get();
        $this->items = Item::where('section','latest')->isPublished()->latest()->take(4)->get();
        $this->featuredItems = Item::where('section','featured')->isPublished()->take(10)->get();
        $this->promotedItems = Item::where('section','promoted')->isPublished()->take(10)->get();
    }
}

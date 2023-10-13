<?php

namespace App\Livewire;

use App\Models\Category;

class CategoriesItemsPage extends  BasePage
{
    protected string $viewPath = "livewire.categories-items-page";
    protected string $pageTitle = "Items";

    // page data
    public Category $category;
    public $items;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->items = $category->items()->isPublished()->get();
    }
}


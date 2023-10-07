<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesPage extends BasePage
{
    protected string $pageTitle = "Categories";
    protected string $viewPath = 'livewire.categories.index';

    // page data
    public $categories;

    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->limit(10)->get();
    }
}

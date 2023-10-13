<?php

namespace App\Livewire;

use App\Models\Category;

class SubCategoriesPage extends BasePage
{
    protected string $viewPath = "livewire.sub-categories.index";
    protected string $pageTitle = "Sub Categories";

    // page data
    public Category $category;
    public $subCategories;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->subCategories = $category->subcategories;
    }
}

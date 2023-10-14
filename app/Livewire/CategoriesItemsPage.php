<?php

namespace App\Livewire;

use App\Livewire\Traits\ItemsFilter;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoriesItemsPage extends BasePage
{
    use WithPagination;
    use ItemsFilter;

    protected string $viewPath = "livewire.items.index";
    protected string $pageTitle = "Items";
    public $isSub = true;

    public function mount(Category $category)
    {
        $this->categories = $this->getParentCategories();
        $this->category = $category->parent_id;
        $this->subCategories = $this->getChildCategories();
        $this->subCategory = $category->id;
    }

    public function render()
    {
        $items = $this->prepareItems();

        return view($this->viewPath, [
            "items" => $items,
        ]);
    }
}

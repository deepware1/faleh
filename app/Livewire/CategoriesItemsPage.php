<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoriesItemsPage extends BasePage
{
    use WithPagination;

    protected string $viewPath = "livewire.categories-items-page";
    protected string $pageTitle = "Items";

    // page data
    public Category $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view($this->viewPath, [
            "items" => $this->category->items()->isPublished()->simplePaginate(8),
        ]);
    }

    public function previousPage($pageName = 'page')
    {
        $page = max(($this->paginators[$pageName] ?? 1) - 1, 1);

        return redirect()->route("subcategories.items", [
            "category" => $this->category,
            "page" => $page
        ]);
    }

    public function nextPage($pageName = 'page')
    {
        $page = ($this->paginators[$pageName] ?? 1) + 1;

        return redirect()->route("subcategories.items", [
            "category" => $this->category,
            "page" => $page
        ]);
    }
}

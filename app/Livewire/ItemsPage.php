<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ItemsPage extends Component
{
    use WithPagination;

    protected string $pageTitle = "Items";
    protected string $viewPath = "livewire.items.index";

    // page data
    public $categories;
    public $subCategories = [];
    public $category = 'all';
    public $subCategory = null;
    public $priceMin;
    public $priceMax;

    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->get(["id", "title"]);
    }

    public function render()
    {
        $items = $this->prepareItems();

        return view($this->viewPath, ["items" => $items]);
    }

    public function updatedCategory()
    {
        if ($this->category != "all") {
            $this->subCategories = Category::where("parent_id", $this->category)->get(["id", "title"]);
        }
    }

    private function prepareItems()
    {
        $builder = Item::query();

        if ($this->category != "all") {
            $builder->where("category_id", $this->category);
        } else {
            $builder = Item::query();
        }

        if ($this->priceMax > 0) {
            $builder->where("price", "<=", $this->priceMax);
        }

        if ($this->priceMin > 0) {
            $builder->where("price", ">=", $this->priceMin);
        }

        return $builder->paginate(4);
    }
}

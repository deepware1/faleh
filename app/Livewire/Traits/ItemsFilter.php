<?php

namespace App\Livewire\Traits;

use App\Models\Category;
use App\Models\Item;

trait ItemsFilter
{
    // page data
    public $categories;
    public $subCategories = [];
    public $category = 'all';
    public $subCategory = null;
    public $priceMin;
    public $priceMax;

    public function mount()
    {
        $this->categories = $this->getParentCategories();
    }

    public function updatedCategory()
    {
        if ($this->category != "all") {
            $this->subCategories = $this->getChildCategories();
        }
    }

    protected function getParentCategories()
    {
        return Category::whereNull("parent_id")->get(["id", "title"]);
    }

    protected function getChildCategories()
    {
        return Category::where("parent_id", $this->category)->get(["id", "title"]);
    }

    protected function prepareItems()
    {
        $builder = Item::query();

        if ($this->category != "all") {
            $builder->where("category_id", $this->category);
        } else {
            $builder = Item::query();
        }

        if ($this->subCategory != "all" || $this->subCategory !== null) {
            $builder->where("subcategory_id", $this->subCategory);
        }

        if ($this->priceMax > 0) {
            $builder->where("price", "<=", $this->priceMax);
        }

        if ($this->priceMin > 0) {
            $builder->where("price", ">=", $this->priceMin);
        }

        return $builder->paginate(12);
    }
}

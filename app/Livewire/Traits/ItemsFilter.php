<?php

namespace App\Livewire\Traits;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
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
    public $countries;
    public $country = 'all';
    public $cities = [];
    public $city = null;
    public $type = 'all';
    public $condition = 'all';
    public $stock = 'all';
    public $sort = 'recent';

    public function mount()
    {
        $this->categories = $this->getParentCategories();
        $this->countries = $this->getCountries();
    }

    public function updatedCategory()
    {
        if ($this->category != "all") {
            $this->subCategories = $this->getChildCategories();
        } else {
            $this->subCategories = [];
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

    public function updatedCountry()
    {
        if ($this->country != "all") {
            $this->cities = $this->getCities();
        } else {
            $this->cities = [];
        }
    }

    protected function getCountries()
    {
        return Country::get(["id", "name"]);
    }

    protected function getCities()
    {
        return City::where("country_id", $this->country)->get(["id", "name"]);
    }

   
    protected function prepareItems()
    {
        $builder = Item::query();

        if ($this->category != "all") {
            $builder->where("category_id", $this->category);
        } else {
            $builder = Item::query();
        }

        if ($this->subCategory != "all" && $this->subCategory != null) {
            $builder->where("subcategory_id", $this->subCategory);
        }

        if ($this->country != "all") {
            $builder->where("country_id", $this->country);
        } else {
            $builder = Item::query();
        }

        if ($this->city != "all" && $this->city != null) {
            $builder->where("city_id", $this->city);
        }

        if ($this->priceMax > 0) {
            $builder->where("price", "<=", $this->priceMax);
        }

        if ($this->priceMin > 0) {
            $builder->where("price", ">=", $this->priceMin);
        }

        if ($this->type != "all") {
            $builder->where('type', $this->type);
        }
        if ($this->condition != "all") {
            $builder->where('condition', $this->condition);
        }
        if ($this->stock != "all") {
            $builder->where('stock', $this->stock);
        }

     
        if ($this->sort == "recent") {
            $builder->orderBy('created_at', 'desc');
        } else {
            $builder->orderBy('created_at', 'asc');
        }
        

        return $builder->paginate(12);
    }
}

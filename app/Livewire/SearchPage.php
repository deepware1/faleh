<?php

namespace App\Livewire;

use App\Models\Item;
use App\Livewire\BasePage;
use Livewire\Component;

class SearchPage extends Component
{
    protected string $pageTitle = "Search";
    protected string $viewPath = "livewire.search-page";

    public $items;
    public $keyword;

    public function render()
    {
       
        $this->items = Item::where('title','like', '%' . $this->keyword . '%')->get();
        return view($this->viewPath);
    }

}

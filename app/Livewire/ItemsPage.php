<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Livewire\Traits\ItemsFilter;

class ItemsPage extends Component
{
    use WithPagination;
    use ItemsFilter;

    protected string $pageTitle = "Items";
    protected string $viewPath = "livewire.items.index";

    public function render()
    {
        $items = $this->prepareItems();

        return view($this->viewPath, ["items" => $items]);
    }
}

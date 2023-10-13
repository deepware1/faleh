<?php

namespace App\Livewire;

use App\Models\Item;

class ItemShowPage extends BasePage
{
    protected string $pageTitle = "Items";
    protected string $viewPath = "livewire.item-show-page";

    public $item;


    public function mount($slug)
    {

        $this->item = Item::where('slug',$slug)->with('country','city')->first();
       
    }
}

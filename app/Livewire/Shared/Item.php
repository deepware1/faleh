<?php

namespace App\Livewire\Shared;

use App\Models\Item as ItemModel;
use Livewire\Component;

class Item extends Component
{
    public $item;

    public function mount(ItemModel $item)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.shared.item');
    }
}

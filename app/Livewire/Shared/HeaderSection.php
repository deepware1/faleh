<?php

namespace App\Livewire\Shared;

use Livewire\Component;
use App\Models\Category;

class HeaderSection extends Component
{
    // page data
    public $categories;

    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->limit(10)->get();
    }

    public function render()
    {
        return view('livewire.shared.header-section');
    }
}

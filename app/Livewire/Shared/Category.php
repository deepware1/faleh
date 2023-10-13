<?php

namespace App\Livewire\Shared;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $category;
    public $isSub;

    public function mount(ModelsCategory $category, bool $isSub = false)
    {
        $this->category = $category;
        $this->isSub = $isSub;
    }

    public function render()
    {
        return view('livewire.shared.category');
    }
}

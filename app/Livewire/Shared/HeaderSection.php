<?php

namespace App\Livewire\Shared;

use Livewire\Component;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HeaderSection extends Component
{
    // page data
    public $categories;
    public ?User $user;

    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->limit(10)->get();
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.shared.header-section');
    }
}

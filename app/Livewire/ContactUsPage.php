<?php

namespace App\Livewire;

use App\Models\Category;

class ContactUsPage extends BasePage
{
    protected string $pageTitle = "Contact US";
    protected string $viewPath = 'livewire.contact-us-page';

    // page data
    public $categories;

    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->limit(10)->get();
    }
}

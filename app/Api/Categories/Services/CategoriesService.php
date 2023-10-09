<?php

namespace App\Api\Categories\Services;

use App\Models\Category;
use App\Api\Base\Traits\HttpResponses;

class CategoriesService
{
    use HttpResponses;
    
    public function index()
    {
        return $this->success(
            Category::whereNull("parent_id")->get()
        );
    }
}

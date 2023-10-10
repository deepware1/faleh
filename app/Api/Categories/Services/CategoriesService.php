<?php

namespace App\Api\Categories\Services;

use App\Models\Category;
use App\Api\Base\Traits\HttpResponses;
use App\Api\Categories\Http\Resources\CategoriesResource;

class CategoriesService
{
    use HttpResponses;
    
    public function index()
    {
        return $this->success(
            new CategoriesResource(Category::whereNull("parent_id")->get())
        );
    }
}

<?php

namespace App\Api\Categories\Services;

use App\Models\Category;
use App\Api\Base\Traits\HttpResponses;
use App\Http\Resources\CategoryResource;
use App\Api\Categories\Http\Resources\CategoriesResource;

class CategoriesService
{
    use HttpResponses;

    public function index()
    {
        $result = CategoryResource::collection(
            Category::whereNull("parent_id")->get()
        );

        return $this->success($result);
    }
}

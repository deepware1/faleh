<?php

namespace App\Api\Categories\Services;

use App\Models\Category;
use App\Api\Base\Traits\HttpResponses;
use App\Api\Categories\Http\Resources\CategoriesResource;
use App\Api\Categories\Http\Resources\SubCategoriesResource;

class CategoriesService
{
    use HttpResponses;

    public function getAllCategories()
    {
        return CategoriesResource::collection(
            Category::whereNull("parent_id")->paginate()
        )->additional($this->successAdditional());
    }

    public function getSubCategories($slug)
    {
        $category =  Category::where("slug",$slug)->first();
        return SubCategoriesResource::collection(
            Category::where("parent_id",$category->id)->paginate()
        )->additional($this->successAdditional());
    }


    public function getCategory($slug)
    {
        $result = new CategoriesResource(
            Category::where("slug",$slug)->first()
        );

        return $this->success($result);
    }

}

<?php

namespace App\Api\Categories\Services;

use App\Models\Category;
use App\Api\Base\Traits\HttpResponses;
use App\Api\Categories\Http\Resources\CategoriesResource;
use App\Api\Categories\Http\Resources\SubCategoriesResource;

class CategoriesService
{
    use HttpResponses;

    public function getAllCategories($request)
    {
        return CategoriesResource::collection(
            Category::whereNull("parent_id")->paginate($request->limit ?? 15)
        )->additional($this->successAdditional());
    }

    public function searchCategories($request)
    {
        if (!empty($request->keyword)) {
            $categories = Category::where("title", 'like', '%' . $request->keyword . '%')->paginate($request->limit ?? 15);
        } else {
            $categories = Category::paginate($request->limit ?? 15);
        }
        return CategoriesResource::collection(
            $categories
        )->additional($this->successAdditional());
    }

    public function getSubCategories($request, $slug)
    {
        $category =  Category::where("slug", $slug)->first();
        return SubCategoriesResource::collection(
            Category::where("parent_id", $category->id)->paginate($request->limit ?? 15)
        )->additional($this->successAdditional());
    }


    public function getCategory($slug)
    {
        $result = new CategoriesResource(
            Category::where("slug", $slug)->first()
        );
        return $this->success($result);
    }
}

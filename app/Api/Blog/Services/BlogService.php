<?php

namespace App\Api\Blog\Services;

use App\Models\Category;
use App\Api\Base\Traits\HttpResponses;
use App\Api\Blog\Http\Resources\BlogResource;
use App\Models\Post;

class BlogService
{
    use HttpResponses;

    public function getAllBlogs($request)
    {
        return BlogResource::collection(
            Post::isPublished()->latest()->paginate($request->limit ?? 15)
        )->additional($this->successAdditional());
    }

    public function getBlog($slug)
    {
        $result = new BlogResource(
            Post::where("slug",$slug)->first()
        );

        return $this->success($result);
    }

}

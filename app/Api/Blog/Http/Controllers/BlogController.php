<?php

namespace App\Api\Blog\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Blog\Services\BlogService;

class BlogController extends Controller
{

    private BlogService $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    public function getAllBlogs(Request $request)
    {
        return $this->blogService->getAllBlogs($request);
    }


    public function getBlog($slug)
    {
        return $this->blogService->getBlog($slug);
    }
}

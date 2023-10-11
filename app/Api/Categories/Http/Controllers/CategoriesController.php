<?php

namespace App\Api\Categories\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Categories\Services\CategoriesService;

class CategoriesController extends Controller
{
   
    private CategoriesService $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }
    
    public function getAllCategories(Request $request)
    {
        return $this->categoriesService->getAllCategories($request);
    }

    public function searchCategories(Request $request)
    {
        return $this->categoriesService->searchCategories($request);
    }

    public function getSubCategories(Request $request,$slug)
    {
        return $this->categoriesService->getSubCategories($request,$slug);
    }

    public function getCategory($slug)
    {
        return $this->categoriesService->getCategory($slug);
    }
}

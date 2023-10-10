<?php

namespace App\Api\Categories\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Api\Categories\Services\CategoriesService;

class CategoriesController extends Controller
{
   
    private CategoriesService $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }
    
    public function getAllCategories()
    {
        return $this->categoriesService->getAllCategories();
    }

    public function getSubCategories($slug)
    {
        return $this->categoriesService->getSubCategories($slug);
    }

    public function getCategory($slug)
    {
        return $this->categoriesService->getCategory($slug);
    }
}

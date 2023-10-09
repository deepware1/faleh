<?php

namespace App\Api\Categories\Http;

use App\Http\Controllers\Controller;
use App\Api\Categories\Services\CategoriesService;

class CategoriesController extends Controller
{
   
    private CategoriesService $categoriesService;

    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }
    
    public function index()
    {
        return $this->categoriesService->index();
    }
}

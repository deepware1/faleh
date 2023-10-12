<?php

namespace App\Api\Items\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\Items\Services\ItemsService;
use App\Api\Items\Requests\GetItemRequest;
use App\Api\Items\Requests\CreateItemRequest;

class ItemsController extends Controller
{

    private ItemsService $itemsService;

    public function __construct(ItemsService $itemsService)
    {
        $this->itemsService = $itemsService;
    }

    public function getAllItems(GetItemRequest $request)
    {
        return $this->itemsService->getAllItems($request);
    }

    public function searchItems(Request $request)
    {
        return $this->itemsService->searchItems($request);
    }

    public function createItem(CreateItemRequest $request)
    {
        return $this->itemsService->createItem($request);
    }

    public function getItem($slug)
    {
        return $this->itemsService->getItem($slug);
    }
}

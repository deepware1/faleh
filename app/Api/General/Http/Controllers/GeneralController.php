<?php

namespace App\Api\General\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Api\General\Services\GeneralService;

class GeneralController extends Controller
{

    private GeneralService $generalService;

    public function __construct(GeneralService $generalService)
    {
        $this->generalService = $generalService;
    }

    public function getAllCountries(Request $request)
    {
        return $this->generalService->getAllCountries($request);
    }

    public function getCountry(Request $request, $id)
    {
        return $this->generalService->getCountry($request, $id);
    }


    public function getAllCities(Request $request)
    {
        return $this->generalService->getAllCities($request);
    }

    public function getAllCurrencies(Request $request)
    {
        return $this->generalService->getAllCurrencies($request);
    }

    public function searchUsers(Request $request)
    {
        return $this->generalService->searchUsers($request);
    }
}

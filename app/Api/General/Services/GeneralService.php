<?php

namespace App\Api\General\Services;

use App\Api\Base\Traits\HttpResponses;
use App\Api\General\Http\Resources\CitiesResource;
use App\Api\General\Http\Resources\CountriesResource;
use App\Api\General\Http\Resources\CurrenciesResource;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;

class GeneralService
{
    use HttpResponses;

    public function getAllCountries($request)
    {
        return CountriesResource::collection(
            Country::paginate($request->limit ?? 15)
        )->additional($this->successAdditional());
    }

    public function getAllCities($request)
    {
        return CitiesResource::collection(
            City::paginate($request->limit ?? 15)
        )->additional($this->successAdditional());
    }

    public function getAllCurrencies($request)
    {
        return CurrenciesResource::collection(
            Currency::paginate($request->limit ?? 15)
        )->additional($this->successAdditional());
    }
}

<?php

namespace App\Api\General\Services;

use App\Api\Auth\Http\Resources\UsersResource;
use App\Api\Base\Traits\HttpResponses;
use App\Api\General\Http\Resources\CitiesResource;
use App\Api\General\Http\Resources\CountriesResource;
use App\Api\General\Http\Resources\CurrenciesResource;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\User;

class GeneralService
{
    use HttpResponses;

    public function getAllCountries($request)
    {
        return CountriesResource::collection(
            Country::paginate($request->limit ?? 15)
        )->additional($this->successAdditional());
    }

    public function getCountry($request, $id)
    {
        return $this->success(new CountriesResource(
            Country::where('id', $id)->first()
        ));
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


    public function searchUsers($request)
    {
        if (!empty($request->keyword)) {
            $items = User::where("name", 'like', '%' . $request->keyword . '%')->paginate($request->limit ?? 15);
        } else {
            $items = User::paginate($request->limit ?? 15);
        }
        return UsersResource::collection(
            $items
        )->additional($this->successAdditional());
    }
}

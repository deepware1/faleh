<?php

namespace App\Livewire;

use App\Models\Item;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class InformationPage extends BasePage
{
    protected string $pageTitle = "Information";
    protected string $viewPath = "livewire.information-page";

    public $weather;


    public function mount()
    {
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat=30.062638&lon=31.24967&appid=9705b410af9a04ff5740d49f2156ff8e");
        $this->weather = json_decode($response->body(),true);
        //   dd($this->weather);
    }
}

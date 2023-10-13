<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ItemCreatePage extends BasePage
{
    protected string $pageTitle = "Submit Ad";
    protected string $viewPath = "livewire.item-create-page";


    public $users, $email, $password,$password_confirmation, $name;
    public $registerForm = false;
    
    // page data
    public $categories;
    public $subCategories;
    public $countries;
    public $cities=[];
    public $currencies;
    public $country;

    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->get();
        $this->subCategories = Category::whereNotNull("parent_id")->get();
        $this->countries = Country::get();
        $this->currencies = Currency::get();
        if($this->country!=""){
            $this->cities = $this->country->cities;
        }
        
    }
    public function registerStore()
    {
        $validatedDate = $this->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);

        $this->password = Hash::make($this->password); 

        $user = User::create(['name' => $this->name, 'email' => $this->email,'password' => $this->password]);
        Auth::login($user);
        return redirect()->to('/');

        $this->resetInputFields();

    }
    public function updatedClientId()
    {
        $this->cities = $this->country->cities;
    }
    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
}

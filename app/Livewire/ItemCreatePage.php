<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use App\Models\Currency;
use Illuminate\Support\Str;
use LaraZeus\Sky\SkyPlugin;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ItemCreatePage extends BasePage
{
    use WithFileUploads;
    protected string $pageTitle = "Submit Ad";
    protected string $viewPath = "livewire.item-create-page";


    public $title, $description, $price, $contact_number, $sub_category, $city, $currency, $type, $condition, $image_file, $image_url='';

    // page data
    public $categories;
    public $subCategories = [];
    public $countries;
    public $cities = [];
    public $currencies;
    public $country = "";
    public $category = "";



    public function mount()
    {
        $this->categories = Category::whereNull("parent_id")->get();
        $this->countries = Country::get();
        $this->currencies = Currency::get();
    }

    public function updatedCountry()
    {
        if ($this->country != "") {
            $this->cities = City::where('country_id', $this->country)->get();
        } else {
            $this->cities = [];
        }
    }

    public function updatedCategory()
    {
        if ($this->category != "all") {
            $this->subCategories = $this->getChildCategories();
        } else {
            $this->subCategories = [];
        }
    }

    protected function getChildCategories()
    {
        return Category::where("parent_id", $this->category)->get(["id", "title"]);
    }


    public function submitAD()
    {
        $validatedDate = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'price' => ['required', 'regex:/^\d+(\.\d{1,2})?$/'],
            'category' => ['required', 'string' , 'exists:categories,id'],
            'sub_category' => ['required', 'string', 'exists:categories,id'],
            'country' => ['required', 'string', 'exists:countries,id'],
            'city' => ['required', 'string', 'exists:cities,id'],
            'currency' => ['required', 'string', 'exists:currencies,id'],
            'contact_number' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', Rule::in(['sell', 'rent'])],
            'condition' => ['required', 'string', Rule::in(['new', 'used'])],
            'image_file' => ['required_without:image_url', 'file'],
            'image_url' => ['required_without:image_file', 'string', 'max:255'],
        ]);
        $user = Auth::user();
        $item = $user->items()->create([
            'title' => $this->title,
            'slug' =>  Str::slug($this->title),
            'description' => $this->description,
            'price' => $this->price,
            'category_id'  => $this->category,
            'subcategory_id' => $this->sub_category ?? null,
            'country_id' => $this->country,
            'city_id' => $this->city,
            'currency_id' => $this->currency,
            'contact_number'  => $this->contact_number,
            'type' => $this->type,
            'condition' => $this->condition,
            'stock' => "in_stock",
            'section'  => "latest",
            "published_at" => now(),
            "featured_image" => $this->image_url,
            "status" => "draft"
        ]);

        if (isset($this->image_file)) {
            $item->addMedia($this->image_file)
                ->toMediaCollection("items", SkyPlugin::get()->getUploadDisk());
        }
        $this->resetInputFields();
        return redirect()->to('/');

        
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->price = '';
        $this->category = '';
        $this->country= '';
        $this->type = '';
        $this->condition = '';
        $this->city = '';
        $this->currency = '';
        $this->image_file = '';
        $this->image_file = null;
        $this->image_url = '';
        $this->sub_category = '';
        $this->contact_number = '';
    }
}

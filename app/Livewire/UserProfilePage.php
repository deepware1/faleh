<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserProfilePage extends BasePage
{
    protected string $pageTitle = "Profile";
    protected string $viewPath = "livewire.user-profile-page";

    public $name, $email, $phone, $about,$old_password,$new_password,$new_password_confirmation;

    public $user;
    public $items;
    public $itemsCount;

    public function mount()
    {
        $this->user = Auth::user();
        $this->itemsCount = $this->user->items()->count();
        $this->items = $this->user->items()->get();
        $this->name=$this->user->name;
        $this->email=$this->user->email;
        $this->phone=$this->user->phone;
        $this->about=$this->user->about;
    
    }

    public function changePassword()
    {
        $validatedDate = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' =>  ['required', 'string', 'max:255', 'unique:users,email,'.$this->user->id],
            'phone' => ['required', 'string'],
            'old_password' => ['nullable', 'required_with:new_password',Password::defaults()],
            'new_password' => ['nullable', 'confirmed', 'different:old_password','required_with:old_password',Password::defaults()],
        ]);

        $user = Auth::user();

        if(!empty($this->new_password))
        {
            if (Hash::check($this->old_password, $user->password)) {
                $user->password =  Hash::make($this->new_password);
                $user->save();
            } else {
                session()->flash('error', 'old password is wrong.');
            }
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->about = $this->about;
        $user->save(); 

        
    }
}

<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterPage extends BasePage
{
    protected string $pageTitle = "Register";
    protected string $viewPath = "livewire.auth.register";


    public $users, $email, $password,$password_confirmation, $name;
    public $registerForm = false;

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

    private function resetInputFields(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
}

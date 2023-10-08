<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;

class LoginPage extends BasePage
{
    protected string $pageTitle = "Login";
    protected string $viewPath = "livewire.auth.login";

    public $email, $password;


    public function loginUser()
    {
        $validatedDate = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        
        if(Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                session()->flash('message', "You are Login successful.");
                return redirect()->to('/');

        }else{
            session()->flash('error', 'email and password are wrong.');
        }
    }

    
}

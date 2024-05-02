<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $username = "";
    public string $password = "";
    protected $rules = [
        'username' => 'required',
        'password' => 'required'
    ];

    public function handleLogin()
    {
        $this->validate();
        $credentials = [
            'username' => $this->username,
            'password' => $this->password,
        ];
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/')->with('alert', ['message' => 'Selamat datang di Siretu', 'type' => 'primary']);
        } else {
            session()->flash('unauthorized', "Login gagal Periksa Kembali Username dan Password");
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}

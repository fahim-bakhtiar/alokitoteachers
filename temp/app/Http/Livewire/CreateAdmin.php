<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class CreateAdmin extends Component
{   

    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $image;
    
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
        'image' => 'image|required'
    ];

    public function render()
    {
        return view('livewire.create-admin');
    }

    public function store_admin(){
        
        dd($this->image);

        $this->validate();

        

    }
}

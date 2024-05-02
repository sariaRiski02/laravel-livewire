<?php

namespace App\Livewire;

use Livewire\Component;

class Form extends Component
{

    public $name;
    public $email;
    public $password;


    public function save()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        dump('Data Valid');
    }


    public function render()
    {
        return view('livewire.form');
    }
}

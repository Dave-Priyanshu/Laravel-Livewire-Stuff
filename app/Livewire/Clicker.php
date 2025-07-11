<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clicker extends Component
{

    public function createNewUser(){
        User::create([
            'name'=> fake()->name,
            'email' => fake()->unique()->safeEmail(),
            'password'=> '123456798',
        ]);

    }
    public function render()
    {
        $title = "Testing Title";
        $users = User::all();
        //! this is one way to pass any varible to the view use compact same as laravel
        // return view('livewire.clicker',compact('title'));

        //! another way is to use array key => value
        return view('livewire.clicker',[
            'title' => $title,
            'users' => $users,
        ]);

    }
}

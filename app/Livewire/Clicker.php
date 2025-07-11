<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Http\Request;
use Livewire\Component;

class Clicker extends Component
{
    public $creatorName = "Priyanshu Dave";

    public $name;
    public $email;
    public $password;

    public function createNewUser(Request $request){

        $request->validate([
           'name' => 'required|min:2|max:50',
           'email'=> 'required|email|unique:users,email',
           'password'=> 'required|min:6',
        ]);

        User::create([
            'name'=> $this->name,
            'email' => $this->email,
            'password'=> $this->password,
        ]);

        $this->reset(['name','email','password']);
        
        session()->flash('success','User created successfully');

    }
    public function render()
    {
        $users = User::latest()->simplePaginate(10);
        //! another way is to use array key => value
        return view('livewire.clicker',[
            'users' => $users,
        ]);

        //! this is one way to pass any varible to the view use compact same as laravel
        // return view('livewire.clicker',compact('title'));


    }
}

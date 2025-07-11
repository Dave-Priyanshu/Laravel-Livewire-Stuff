<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{
    use WithFileUploads;

    #[Rule('required|min:3|max:255')]
    public $name;

    #[Rule('required|email|unique:users,email')]
    public $email;
    
    #[Rule('required|min:3')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;

    public function create(){
        
        $validate = $this->validate();
        // dd($validate);

        if($this->image){
            $validate['image'] = $this->image->store('uploads','public');
        }

        User::create($validate);
        $this->reset(['name','email','password','image']);
        session()->flash('success','user created successfully!');
    }
    public function render()
    {
        return view('livewire.register-form');
    }
}

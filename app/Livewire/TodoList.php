<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;

class TodoList extends Component
{
    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public function create(){
        // validate
        $validated = $this->validateOnly('name');

        // create todo
        Todo::create($validated);

        // clear input
        $this->reset('name');

        // flash message
        session()->flash('success','Todo created successfully.');
    }

    public function render()
    {
        return view('livewire.todo-list',[
            'todos' => Todo::latest()->where('name','like',"%{$this->search}%")->paginate(3)
        ]);
    }
}

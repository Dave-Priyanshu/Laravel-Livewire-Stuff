<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;
    public $editingTodoID;
    #[Rule('required|min:3|max:50')]
    public $editingTodoName;

    public function create(){
        // validate
        $validated = $this->validateOnly('name');

        // create todo
        Todo::create($validated);

        // clear input
        $this->reset('name');

        // flash message
        session()->flash('success','Todo created successfully.');

        $this->resetPage();
    }
    public function delete($todoID){
        try{

            Todo::findOrFail($todoID)->delete();
        }catch(\Exception $e){
            session()->flash('error','Failed to delete todo.');
            return;
        }
    }
    public function toggle($todoID){
        $todo = Todo::find($todoID);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    // public function edit($todoID){
    //     $this->editingTodoID = $todoID;
    //     $this->editingTodoName = Todo::find($todoID)->name;
    // }
    public function edit(Todo $todo){
        $this->editingTodoID = $todo->id;
        $this->editingTodoName = $todo->name;
    }

    public function cancelEdit(){
        $this->reset([
            'editingTodoID',
            'editingTodoName'
        ]);
    }

    public function update(){
        $this->validateOnly('editingTodoName');

        Todo::find($this->editingTodoID)->update([
            'name'=>$this->editingTodoName
        ]);
        $this->cancelEdit();
        session()->flash('success','Todo updated successfully.');
    }

    public function render()
    {
        return view('livewire.todo-list',[
            'todos' => Todo::latest()->where('name','like',"%{$this->search}%")->paginate(3)
        ]);
    }
}

<div>
    @include('livewire.includes.createTodo')
    @include('livewire.includes.search')

    <div id="todos-list">
     @foreach ($todos as $todo)
         @include('livewire.includes.todoCard')
     @endforeach

        <div class="my-2">
            {{ $todos->links() }}
        </div>
    </div>
    
</div>
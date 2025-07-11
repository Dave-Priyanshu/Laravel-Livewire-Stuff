<div wire:key="{{ $todo->id }}" class="todo p-6 bg-[#1E1E1F] border-l-4 border-[#432AF7] rounded-lg shadow-md hover:shadow-xl transition-shadow duration-200">
    <div class="flex justify-between items-center space-x-4">
        <div class="flex items-center space-x-4 flex-1">
            <input wire:click="toggle({{ $todo->id }})" type="checkbox" {{ $todo->completed ? 'checked' : '' }}
                class="w-5 h-5 text-[#854DFF] bg-gray-800 border-gray-600 rounded focus:ring-[#854DFF]">
            @if ($editingTodoID === $todo->id)
                <div class="flex-1 flex flex-col sm:flex-row gap-3">
                    <input wire:model="editingTodoName" type="text" placeholder="Update todo..."
                        class="bg-gray-800 text-white text-sm rounded-lg w-full p-3 placeholder-gray-400 focus:ring-2 focus:ring-[#854DFF] focus:outline-none">
                    <div class="flex gap-2">
                        <button wire:click="update" type="submit"
                            class="px-4 py-2 bg-[#854DFF] text-white font-semibold rounded-lg hover:bg-[#432AF7] transition-colors duration-200">Update</button>
                        <button wire:click="cancelEdit" type="submit"
                            class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg hover:bg-gray-700 transition-colors duration-200">Cancel</button>
                    </div>
                    @if (session('success'))
                        <span class="text-green-500 text-xs mt-2">{{ session('success') }}</span>
                    @endif
                    @error('editingTodoName')
                        <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
                    @enderror
                </div>
            @else
                <h3 class="text-lg font-semibold text-white">{{ $todo->name }}</h3>
            @endif
        </div>
        <div class="flex items-center space-x-3">
            <button wire:click="edit({{ $todo->id }})" class="text-[#854DFF] hover:text-[#432AF7] transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button>
            <button wire:click="delete({{ $todo->id }})" class="text-red-500 hover:text-red-600 transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
        </div>
    </div>
    <div class="mt-2 text-sm text-gray-400">{{ $todo->created_at }}</div>
</div>
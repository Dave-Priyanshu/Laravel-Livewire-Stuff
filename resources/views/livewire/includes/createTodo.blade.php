   <div class="container content py-6 mx-auto">
        <div class="mx-auto">
            <div id="create-form" class="hover:shadow-lg p-6 bg-[#1E1E1F] border-[#432AF7] border-t-2">
                <div class="flex">
                    <h2 class="font-semibold text-lg text-white mb-5">Create New Todo</h2>
                </div>
                <div>
                    <form>
                        <div class="mb-6">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-white">*
                                Todo </label>
                            <input wire:model="name" type="text" id="title" placeholder="Todo.."
                                class="bg-gray-800 text-white text-sm rounded block w-full p-2.5 placeholder-gray-400">
                            @error('name')
                                
                            <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
                            @enderror
                        </div>
                        <button wire:click.prevent="create" type="submit"
                            class="px-4 py-2 bg-[#854DFF] text-white font-semibold rounded hover:bg-[#432AF7]">Create
                            +</button>
                            
                            @if (session('success'))
                                <span class="text-green-500 text-xs">{{ session('success') }}</span>
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
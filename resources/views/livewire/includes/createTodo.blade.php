<div class="container py-6 mx-auto">
    <div class="mx-auto">
        <div id="create-form" class="p-6 bg-[#1E1E1F] border-[#432AF7] border-l-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-200">
            <div class="mb-4">
                <h2 class="font-semibold text-xl text-white">Create New Todo</h2>
            </div>
            <div>
                <form class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <label for="name" class="block mb-2 text-sm font-medium text-white">Todo *</label>
                        <input wire:model="name" type="text" id="title" placeholder="Add a new todo..."
                            class="bg-gray-800 text-white text-sm rounded-lg block w-full p-3 placeholder-gray-400 focus:ring-2 focus:ring-[#854DFF] focus:outline-none">
                        @error('name')
                            <span class="text-red-500 text-xs mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-end">
                        <button wire:click.prevent="create" type="submit"
                            class="px-6 py-3 bg-[#854DFF] text-white font-semibold rounded-lg hover:bg-[#432AF7] transition-colors duration-200">Create</button>
                    </div>
                    @if (session('success'))
                        <span class="text-green-500 text-xs mt-2">{{ session('success') }}</span>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
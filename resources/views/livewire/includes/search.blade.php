<div id="search-box" class="my-6">
    <div class="flex items-center bg-[#1E1E1F] p-4 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6 text-white mr-3">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
        </svg>
        <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search todos..."
            class="bg-gray-800 text-white text-sm rounded-lg px-4 py-3 w-full placeholder-gray-400 focus:ring-2 focus:ring-[#854DFF] focus:outline-none" />
    </div>
</div>
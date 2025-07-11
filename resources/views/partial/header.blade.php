<div class="flex border-[#432AF7] border-t-4 shadow-md w-full">
    <header class="flex justify-between items-center px-8 bg-[#1E1E1F] h-16 w-full">
        <!-- Left: Navigation Links -->
        <nav class="flex items-center space-x-6 text-sm">
            <a href="{{ route('home') }}" class="hover:underline text-white">Home</a>
            <a href="{{ route('register') }}" class="hover:underline text-white">Custom Auth</a>
            <a href="{{ route('livewireTUT') }}" class="hover:underline text-white">Livewire Add User</a>
            <a href="{{ route('livewire.todo') }}" class="hover:underline text-white">Todo</a>
            <a href="{{ route('livewire.register') }}" class="hover:underline text-white">Todo Register</a>
        </nav>

        <!-- Right: Logo -->
        <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/imgs/Livewire.png') }}" alt="Logo" class="w-10 h-10 rounded-full" />
        </div>
    </header>
</div>

<div class="p-6 bg-white rounded shadow max-w-3xl mx-auto">
    <h1 class="text-xl font-bold text-indigo-600 mb-4">Creator: {{ $creatorName }}</h1>

    @if (session('success'))
        <span class="bg-green-100 text-green-800 p-2 rounded">{{session('success')}}</span>
    @endif
    @if (session('error'))
        {{session('error')}}
    @endif

    <form wire:submit.prevent="createNewUser" class="space-y-4">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
            <input wire:model="name" type="text" name="name" placeholder="Enter name"
                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
            <input wire:model="email" type="text" name="email" placeholder="Enter email"
                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
            <input wire:model="password" type="password" name="password" placeholder="Enter password"
                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
            Create
        </button>
    </form>

    <!-- User Table -->
    <div class="mt-8">
        <table class="w-full border border-gray-300 rounded-md overflow-hidden">
            <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                <tr>
                    <th class="p-3 border border-gray-300">ID</th>
                    <th class="p-3 border border-gray-300">Name</th>
                    <th class="p-3 border border-gray-300">Email</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800">
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="p-3 border border-gray-300">{{ $user->id }}</td>
                        <td class="p-3 border border-gray-300">{{ $user->name }}</td>
                        <td class="p-3 border border-gray-300">{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{$users->links()}}
    </div>
</div>

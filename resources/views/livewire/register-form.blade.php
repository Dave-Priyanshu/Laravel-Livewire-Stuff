<div class="min-h-screen flex items-center justify-center bg-[#121212] text-white px-4">
    <div class="w-full max-w-md bg-[#1E1E1F] border border-[#2a2a2a] rounded-2xl p-8 shadow-lg">
        <h2 class="text-2xl font-semibold mb-6 text-center">Create Account</h2>

        @if (session()->has('success'))
            <div class="bg-green-600 bg-opacity-20 text-green-300 text-sm p-3 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="create" class="space-y-5">
            <!-- Name -->
            <div>
                <label class="text-sm block mb-1">Name</label>
                <input wire:model="name" type="text" placeholder="John Doe"
                    class="w-full bg-[#2A2A2A] text-white border border-gray-700 rounded-lg px-4 py-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('name')
                    <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="text-sm block mb-1">Email</label>
                <input wire:model="email" type="email" placeholder="you@example.com"
                    class="w-full bg-[#2A2A2A] text-white border border-gray-700 rounded-lg px-4 py-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('email')
                    <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="text-sm block mb-1">Password</label>
                <input wire:model="password" type="password" placeholder="Your Password"
                    class="w-full bg-[#2A2A2A] text-white border border-gray-700 rounded-lg px-4 py-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('password')
                    <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- proifle pic -->
            <div>
                <label class="text-sm block mb-1">Profile Picture</label>
                <input wire:model="image" accept="image/png, image/jepg, image/jpg" type="file" id="image"
                    class="w-full bg-[#2A2A2A] text-white border border-gray-700 rounded-lg px-4 py-2 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                @error('image')
                    <p class="text-xs text-red-400 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="text-sm block mb-1">Live Review</label>
                @if ($image)
                    <img class="rounded w-12 h-12 mt-5 block" src="{{ $image->temporaryUrl() }}" alt="">
                @endif
                {{-- <div wire:loading wire:target="image">
                    <span class="text-green-500">Uploading....</span>
                </div> --}}
            </div>


            <!-- Submit Button -->
            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 transition-colors py-2 rounded-lg font-medium text-white">
                Register
            </button>
        </form>
    </div>
</div>

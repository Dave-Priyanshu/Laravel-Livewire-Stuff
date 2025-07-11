<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#121212] text-white">
    <div id="head" class="flex border-[#432AF7] border-t-4 shadow-md">
        <div class="w-full">
            <header class="flex bg-[#1E1E1F] justify-between h-16 items-center px-8">
                <div id="left-header" class="flex items-center">
                    <h1 class="text-xl font-bold text-white">LivewireTodo App</h1>
                </div>
                <div id="right-header" class="flex items-center space-x-4">
                    <div class="relative">
                        <img src="{{ asset('assets/imgs/Livewire.png') }}" class="w-10 h-10">
                    </div>
                </div>
            </header>
        </div>
    </div>
    <div id="content" class="mx-auto py-8" style="max-width: 600px;">
        @livewire('todo-list')
    </div>
</body>

</html>
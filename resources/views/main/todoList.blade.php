<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#121212] text-white">
    
    {{-- header --}}
    @include('partial.header')
    
    <div id="content" class="mx-auto py-8" style="max-width: 600px;">
        @livewire('todo-list')
    </div>
</body>

</html>
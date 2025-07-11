<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
</head>
<body>
    <h1>User  Dashboard Page</h1>
    <p>Role: {{$user->role}}</p>
    <p>Hello {{$user->name}}, Welcome to Your Dashboard</p>

    @if (session('success'))
        {{session('success')}}
    @endif
    <h2>Update your details</h2>
    <form action="{{ route('user.update') }}" method="post">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $user->name }}">

        <label for="email">Email</label>
        <input type="text" name="email" value="{{ $user->email }}">

        <label for="password">Password</label>
        <input type="text" name="password" value="{{ $user->password }}" placeholder="Leave blank to keep current password">

        <button type="submit">Submit</button>
    </form>

    <div>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    {{-- header --}}
    @include('partial.header')
    <h1>Registration Form</h1>

    <form action="{{route('register')}}" method="POST">
        @csrf
        <div class="container">
            
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{old('name')}}"><br>

            <label for="email">Email:</label>
            <input type="text" name="email" value="{{old('email')}}"><br>

            <label for="role">Role</label>
                <select name="role">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>

            <label for="password">Password:</label>
            <input type="password" name="password" value="{{old('password')}}">

        </div>
        <button type="submit">Register</button>
        <p>Already have an Account? <a href="{{route('user.login')}}">Login</a></p>
    </form>
</body>
</html>
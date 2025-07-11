<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
</head>
<body>
    <h1>Admin Login Form</h1>

    <form action="{{route('admin.login')}}" method="POST">
        @csrf
        <div class="container">
            
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{old('email')}}"><br>

            <label for="password">Password:</label>
            <input type="password" name="password" value="{{old('password')}}">

        </div>
        <button type="submit">Login</button>
        <p>Don't have an Account? <a href="{{route('register')}}">Register</a></p>
        <p>Are you a user? <a href="{{ route('user.login') }}">User Login</a></p>
    </form>
</body>
</html>
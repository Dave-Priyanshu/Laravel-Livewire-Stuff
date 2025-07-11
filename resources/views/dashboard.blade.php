<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
</head>
<body>
    <h1>Dashboard Page</h1>
    <p>Role: {{$user->role}}</p>
    <p>Hello {{$user->name}}, Welcome to Your Dashboard</p>

    @if (session('success'))
        <div class="alert alert-success">
              {{ session('success') }}  
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-error">
            {{ sessino('error') }}
        </div>
    @endif

    <h3>all users details</h3>
    <table>
        @if ($users->count() > 0)
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)    
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->created_at,'Y:m:d H:m:s'}}</td>
                    <td>
                        @if($user->role !== 'admin')
                        <form action="{{ route('make.admin',$user->id) }}" method="POST">
                            @csrf
                            <button type="submit">Make Admin</button>
                        </form>
                        @else
                        <span>Already Admin</span><br>
                        @endif

                        @if ($user->role !== 'admin')
                        <form action="{{ route('user.delete', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit">Delete User</button>
                        </form>
                            
                        @else
                            <span>You can't delete admin</span>
                        @endif

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else    
        <p>No User Found</p>
    @endif

    <div>
        {{$users->links()}}
    </div>

    <div>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
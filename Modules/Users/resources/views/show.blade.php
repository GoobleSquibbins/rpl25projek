<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Users</title>
</head>

<body class="home">
    <div class="sidebar">
        <a class="sidebar_content" href="{{ route('main') }}">Home</a>
        <div class="sidebar_content" id="active">Users</div>
        <div class="sidebar_content">Speed</div>
        <div class="sidebar_content">Item</div>
        <div class="sidebar_content">Report</div>
        <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
        <div class="sidebar_content">{{Auth::user()->name}}</div>
    </div>
    <div class="home_content">
        <a href="{{ route('register.user') }}" class="add_x">+ User</a>
        <h1>RESIK LAUNDRY</h1>
            
                <h1>{{ $data->name }}</h1>
                <h3>{{ $data->role }}</h3>
                <h3>{{ $data->email }}</h3>
                <h3>{{ $data->telephone }}</h3>
                <h3>{{ $data->address }}</h3>
    </div>
</body>

</html>
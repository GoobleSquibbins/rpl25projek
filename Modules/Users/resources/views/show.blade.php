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
        @if (Auth::user()->role == 'admin')
            <a class="sidebar_content" href="{{ route('main') }}">Transaction</a>
            <a class="sidebar_content" href="{{ route('user') }}" id="active">Users</a>
            <a class="sidebar_content" href="{{ route('speed') }}">Speed</a>
            <a class="sidebar_content" href="{{ route('item') }}">Item</a>
            <a class="sidebar_content" href="{{ route('report') }}">Report</a>
            <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
        @endif
        @if (Auth::user()->role == 'cashier')
            <div class="sidebar_content" id="active">Home</div>
            <div class="sidebar_content">Report</div>
            <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
        @endif
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
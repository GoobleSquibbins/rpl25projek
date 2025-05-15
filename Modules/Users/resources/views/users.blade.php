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
        <div class="sidebar_content">Home</div>
        <div class="sidebar_content" id="active">Users</div>
        <div class="sidebar_content">Speed</div>
        <div class="sidebar_content">Item</div>
        <div class="sidebar_content">Report</div>
        <div class="sidebar_content">Logout</div>
    </div>
    <div class="home_content">
        <a href="" class="add_x">+ User</a>
        <h1>RESIK LAUNDRY</h1>
        <table class="main_table">
            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>E-mail</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $users)
            <tr>
                <td>{{ $users->name }}</td>
                <td>{{ $users->role }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->telephone }}</td>
                <td>{{ $users->address }}</td>
                <td>TBA</td>
            </tr>
            @endforeach
        </table>
    </div>
    </div>
</body>

</html>
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

<body>
    <div class="main">

        <div class="sidebar">
            <a class="sidebar_content" href="{{ route('main') }}">Transaction</a>
            <a class="sidebar_content" href="{{ route('user') }}" id="active">Users</a>
            <a class="sidebar_content" href="{{ route('speed') }}">Speed</a>
            <a class="sidebar_content" href="{{ route('item') }}">Item</a>
            <a class="sidebar_content" href="{{ route('report') }}">Report</a>
            <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
        </div>
        <div class="home_content">
            <a href="{{ route('user') }}" class="add_x">Back</a>
            <h1 class="title">RESIK LAUNDRY</h1>
            <div class="user_detail_container">
                <table class="user_detail">
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td>
                            {{ $data->name }}
                        </td>
                    </tr>

                    <tr>
                        <td>Role</td>
                        <td>:</td>
                        <td>
                            {{ $data->role }}
                        </td>
                    </tr>

                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            {{ $data->email }}
                        </td>
                    </tr>

                    <tr>
                        <td>Phone</td>
                        <td>:</td>
                        <td>
                            {{ $data->telephone }}
                        </td>
                    </tr>

                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td>
                            {{ $data->address }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
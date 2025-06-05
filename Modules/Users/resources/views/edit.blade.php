<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
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
            <a href="{{ route('user')  }}" class="add_x">Back</a>
            <h1 class="title">REGISTER USER</h1>
            <div class="card_user_create">
                <form action="{{ route('update.user', ['user_id' => $data->user_id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="user_id" value="{{$data->user_id}}">
                    <div class="form_item">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Nama User*" value="{{$data->name}}">
                    </div>
                    <div class="form_item">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password* (kosongkan jika tidak perlu)">
                    </div>
                    <div class="form_item">
                        <label for="pass_confirm">Confirm Password</label>
                        <input type="password" name="pass_confirm" placeholder="Confirm Password*">
                    </div>
                    <div class="form_item">
                        <label for="role"></label>
                        <select name="role" id="role">
                            @if ($data->role == 'admin')
                                <option value="admin" selected>Admin</option>
                                <option value="cashier">Cashier</option>
                            @else
                                <option value="admin" selected>Admin</option>
                                <option value="cashier">Cashier</option>
                            @endif
                        </select>
                    </div>
                    <div class="form_item">
                        <input type="text" name="email" placeholder="Email User" value="{{$data->email}}">
                    </div>
                    <div class="form_item">
                        <input type="text" name="telephone" placeholder="Telephone User" value="{{$data->telephone}}">
                    </div>
                    <div class="form_item">
                        <input type="text" name="address" placeholder="Nama User" value="{{$data->address}}">
                    </div>
                    <button class="btn_submit_create">Ok</button>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
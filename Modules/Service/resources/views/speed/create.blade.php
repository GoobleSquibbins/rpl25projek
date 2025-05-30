<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Add Speed</title>
</head>

<body class="home">
<div class="sidebar">
        @if (Auth::user()->role == 'admin')
            <a class="sidebar_content" href="{{ route('main') }}">Transaction</a>
            <a class="sidebar_content" href="{{ route('user') }}">Users</a>
            <a class="sidebar_content" href="{{ route('speed') }}" id="active">Speed</a>
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
        <a href="{{ route('speed')  }}" class="add_x">Back</a>
        <h1>ADD SPEED</h1>
        <div class="card_user_create">
            <form action="{{ route('store.speed') }}" method="post" class="form_create_user">
            @csrf
                <div class="form_item">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name">
                </div>

                <div class="form_item">
                    <label for="duration">Duration in Hours</label>
                    <input type="text" id="duration" name="duration">
                </div>

                <div class="form_item">
                    <label for="price">Price</label>
                    <input type="text" id="price" name="price">
                </div>
                <button class="btn_submit_create_transaction">Add Speed</button>
            </form>
        </div>
    </div>
</body>

</html>
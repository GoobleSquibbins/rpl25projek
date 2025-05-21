<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Main</title>
</head>

<body class="home">
    <div class="sidebar">
        @if (Auth::user()->role == 'admin')
            <div class="sidebar_content" id="active">Home</div>
            <a class="sidebar_content" href="{{ route('user') }}">Users</a>
            <div class="sidebar_content">Speed</div>
            <div class="sidebar_content">Item</div>
            <div class="sidebar_content">Report</div>
            <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
        @endif
        @if (Auth::user()->role == 'cashier')
            <div class="sidebar_content" id="active">Home</div>
            <div class="sidebar_content">Report</div>
            <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
        @endif
    </div>
    <div class="home_content">
        <a href="" class="add_x">+ Transaction</a>
        <h1>RESIK LAUNDRY</h1>
        <table class="main_table">
            <tr>
                <th>Invoice ID</th>
                <th>Client Name</th>
                <th>Cashier</th>
                <th>Transaction Date</th>
                <th>Pickup Date</th>
                <th>Speed</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Notes</th>
                <th>Action</th>
            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
        </table>
    </div>
    </div>
</body>

</html>
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
            <a class="sidebar_content" href="{{ route('main') }}" id="active">Transaction</a>
            <a class="sidebar_content" href="{{ route('user') }}">Users</a>
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
        <a href="{{ route('add.transaction')  }}" class="add_x">+ Transaction</a>
        <h1>RESIK LAUNDRY</h1>
        <table class="main_table">
            <tr>
                <th>Invoice ID</th>
                <th>Client Name</th>
                <th>Cashier</th>
                <th>Transaction Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->invoice_id }}</td>
                    <td>{{ $d->client_name }}</td>
                    <td>{{ $d->cashier_name }}</td>
                    <td>{{ $d->transaction_date }}</td>
                    <td>{{ $d->status }}</td>
                    <td>
                        <a href="{{ route('details', ['transaction_id' => $d->transaction_id]) }}">Details</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
</body>

</html>
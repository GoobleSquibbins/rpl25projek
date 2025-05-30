<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Item</title>
</head>

<body class="home">
    <div class="sidebar">
        @if (Auth::user()->role == 'admin')
            <a class="sidebar_content" href="{{ route('main') }}">Transaction</a>
            <a class="sidebar_content" href="{{ route('user') }}">Users</a>
            <a class="sidebar_content" href="{{ route('speed') }}">Speed</a>
            <a class="sidebar_content" href="{{ route('item') }}" id="active">Item</a>
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
        <a href="{{ route('add.item') }}" class="add_x">+ Item</a>
        <h1>RESIK LAUNDRY</h1>
        <table class="main_table">
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Created</th>
                <th>Updated</th>
                <th>Action</th>
            </tr>
            @foreach ($data as $speed)
                <tr>
                    <td>
                        {{ $speed->name }}
                    </td>
                    <td>
                        {{ $speed->unit_type }}
                    </td>
                    <td>
                        Rp {{ number_format($speed->price, 0, ',', '.') }}
                    </td>
                    <td>
                        {{ $speed->created_at }}
                    </td>
                    <td>
                        {{ $speed->updated_at }}
                    </td>
                    <td>
                        <a href="{{ route('edit.item', ['item_id' => $speed->item_id]) }}">Edit</a>
                        <br>
                        <a href="{{ route('delete.item', ['item_id' => $speed->item_id]) }}">Delete</a>
                        <!-- <select name="" id="" onchange="location = this.value;">                        
                                <option value="">Action</option>
                                <option value="/show_user">Show</option>
                                <option value="/edit_user">Edit</option>
                                <option value="/delete_user">Delete</option>
                            </select> -->
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Detail</title>
</head>

<body>
    <div class="main">
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
            <a href="{{ route('main')  }}" class="add_x">Back</a>
            <h1 class="title">RESIK LAUNDRY</h1>
            <div class="table_det">
                <div class="detail_gen_info">
                    <table>
                        <tr><td>Invoice ID</td><td>:</td><td>{{ $data->invoice_id }}</td></tr>
                        <tr><td>Client Name</td><td>:</td><td>{{ $data->client_name }}</td></tr>
                        <tr><td>Cashier</td><td>:</td><td>{{ $data->cashier_name }}</td></tr>
                        <tr><td>Transaction Date</td><td>:</td><td>{{ $data->transaction_date }}</td></tr>
                        <tr><td>Total Price</td><td>:</td><td>Rp {{ number_format($data->total, 0, ',', '.') }}</td></tr>
                        <tr><td>Notes</td><td>:</td><td>{{ $data->notes }}</td></tr>
                    </table>
                    <div class="detail_gen_links">
                        <a href="{{ route('edit.transaction', ['transaction_id' => $data->transaction_id]) }}" id="edit">Edit Transaction</a>
                        <a href="{{ route('delete.transaction', ['transaction_id' => $data->transaction_id]) }}" id="delete">Delete Transaction</a>
                    </div>
                </div>

                <div class="spacer_det"></div>

                <div class="detail_card_holder">
                    @foreach ($order_items as $item)
                    <div class="detail_card">
                        <table class="detail_order">
                            <tr><td>Speed</td><td>:</td><td>{{ $item->speed }}</td></tr>
                            <tr><td>Item</td><td>:</td><td>{{ $item->item }}</td></tr>
                            <tr><td>QTY</td><td>:</td><td>{{ $item->qty }}</td></tr>
                            <tr><td>Subtotal</td><td>:</td><td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td></tr>
                            <tr><td>Status</td><td>:</td><td>{{ $item->status }}</td></tr>
                            <tr><td>Finish Date</td><td>:</td><td>{{ $item->finish_date }}</td></tr>
                        </table>
                        <div class="actions">
                            <div class="action_order_item">
                                <div class="order_det_links">
                                    <a href="{{ route('advance.transaction', ['detail_id', 'detail_id' => $item->detail_id]) }}" id="steps">
                                            @switch($item->status->value)
                                                @case('pending')
                                                    Start Order
                                                    @break
                        
                                                @case('in_process')
                                                    Finish Order
                                                    @break
                        
                                                @case('done')
                                                    Order Picked-Up
                                                    @break
                                            @endswitch
                                    </a>
                                    @if($item->status->value == 'pending')
                                    <a href="{{ route('edit.transaction.item', ['detail_id' => $item->detail_id]) }}" id="edit">Edit Item</a>
                                    @endif
                                    <a href="{{ route('delete.transaction.item', ['detail_id' => $item->detail_id, 'transaction_id' => $item->transaction_id]) }}" id="delete">Delete
                                        Transaction</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>
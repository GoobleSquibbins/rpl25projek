<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Detail</title>
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
        <a href="{{ route('main')  }}" class="add_x">Back</a>
        <h1>RESIK LAUNDRY</h1>
        <div class="table_det">
            <table>
                <tr>
                    <td>
                        Invoice ID
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->invoice_id }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Client Name
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->client_name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Cashier
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->cashier_name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        Transaction Date
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->transaction_date }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Pick-up Date
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->pickup_date }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Speed
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->speed }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Item
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->item }}
                    </td>
                </tr>

                <tr>
                    <td>
                        QTY
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->qty }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Total Price
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->total_price }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Status
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->status }}
                    </td>
                </tr>

                <tr>
                    <td>
                        Notes
                    </td>
                    <td>:</td>
                    <td>
                        {{ $data->notes }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</body>

</html>
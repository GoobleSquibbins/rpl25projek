<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>

<body>
<div class="home_content">
                <h1 class="title">LAPORAN</h1>
                <table class="main_table">
                    <tr>
                        <th>Invoice ID</th>
                        <th>Client Name</th>
                        <th>Cashier</th>
                        <th>Transaction Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($transactions as $d)
                        <tr>
                            <td>
                                {{ $d->invoice_id }}
                            </td>
                            <td>
                                {{ $d->client_name }}
                            </td>
                            <td>
                                {{ $d->cashier_name }}
                            </td>
                            <td>
                                {{ $d->transaction_date }}
                            </td>
                            <td>
                                @php
                                    $statusCounts = $d->details->groupBy('status')->map->count();
                                @endphp

                                @foreach ($statusCounts as $status => $count)
                                    <div>
                                        {{ ucfirst(str_replace('_', ' ', $status)) }} (
                                        {{ $count }})
                                    </div>
                                @endforeach
                            </td>
                            <td>
                                <a
                                    href="{{ route('history.details', ['transaction_id' => $d->transaction_id]) }}">Details</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="stat">
                    <table>
                        <tr>
                            <td>Total Orders</td>
                            <td>:</td>
                            <td>
                                {{ $transactions->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>Total Revenue</td>
                            <td>:</td>
                            <td>
                                Rp {{
    number_format(
        $transactions->where('finished', true)->sum('total'),
        0,
        ',',
        '.'
    )
                                }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
</body>

<script>
    window.onload = function () {
        window.print();
    }
</script>

</html>
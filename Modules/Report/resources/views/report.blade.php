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

<body>
    @if (session('success'))
        <div class="notification_success" id="notification_s">
            <h1>Success</h1>
            <p>
                {{session('success')}}
            </p>
        </div>
    @endif
    <div class="main">
        <div class="report">
            <div class="sidebar">
                @if (Auth::user()->role == 'admin')
                    <a class="sidebar_content" href="{{ route('main') }}">Transaction</a>
                    <a class="sidebar_content" href="{{ route('user') }}">Users</a>
                    <a class="sidebar_content" href="{{ route('speed') }}">Speed</a>
                    <a class="sidebar_content" href="{{ route('item') }}">Item</a>
                    <a class="sidebar_content" href="{{ route('report') }}" id="active">Report</a>
                    <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
                @endif
                @if (Auth::user()->role == 'cashier')
                    <a class="sidebar_content" id="active">Transaction</a>
                    <a class="sidebar_content">Report</a>
                    <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
                @endif
            </div>
            <div class="home_content">
                <a class="add_x"
                    href="{{ route('print', ['opt' => $opt, 'from' => $from ?? null, 'to' => $to ?? null]) }}"
                    target="_blank" class="btn btn-primary">
                    Print
                    {{ $opt }}
                </a>

                <h1 class="title">LAPORAN</h1>
                <div class="nav_btn">
                    <a href="{{ route('today') }}">Today</a>
                    <a href="{{ route('week') }}">Week</a>
                    <a href="{{ route('month') }}">Month</a>
                    <form action="{{ route('cust.date') }}" method="get">

                        <div class="from">
                            <label for="from">From</label>
                            <input name="from" id="from" type="date">
                        </div>
                        <div class="to">
                            <label for="to">To</label>
                            <input name="to" id="to" type="date">
                        </div>
                        <button>Ok</button>
                    </form>
                </div>
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
        </div>
    </div>
</body>

<script>
    const notification = document.getElementById('notification_s');

    if (notification) {
        setTimeout(() => {
            notification.classList.add('hide');

            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 3000);

        notification.addEventListener('click', () => {
            notification.classList.add('hide');
            setTimeout(() => {
                notification.remove();
            }, 500);
        });
    }
</script>

</html>
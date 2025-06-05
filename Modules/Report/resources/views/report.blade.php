<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>TODAY'S REPORT</title>
</head>

<body>
    <div class="report_container">
        <h1 class="title">FINISHED TRANSACTION</h1>
        <div class="report_table_holder">

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
                            <a href="{{ route('history.details', ['transaction_id' => $d->transaction_id]) }}">Details</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

<script>
    window.onload = () => {
        window.print();

        document.body.addEventListener('click', () => {
            window.location.href = "{{ route('main') }}";
        });
    };

</script>

</html>
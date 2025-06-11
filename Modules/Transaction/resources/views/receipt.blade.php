<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Receipt</title>
</head>

<body>

    
    <div class="receipt_container">
        <h1 class="title">RESIK LAUNDRY</h1>
        <table>
            <tr>
                <td>Invoice ID</td>
                <td>:</td>
                <td>
                    {{ $data->invoice_id }}
                </td>
            </tr>
            <tr>
                <td>Client Name</td>
                <td>:</td>
                <td>
                    {{ $data->client_name }}
                </td>
            </tr>
            <tr>
                <td>Cashier</td>
                <td>:</td>
                <td>
                    {{ $data->cashier_name }}
                </td>
            </tr>
            <tr>
                <td>Transaction Date</td>
                <td>:</td>
                <td>
                    {{ $data->transaction_date }}
                </td>
            </tr>
            <tr>
                <td>Notes</td>
                <td>:</td>
                <td>
                    {{ $data->notes }}
                </td>
            </tr>
            @foreach ($order_items as $item)
                <tr>
                    <td>Speed</td>
                    <td>:</td>
                    <td>
                        {{ $item->speed }}
                    </td>
                </tr>
                <tr>
                    <td>Item</td>
                    <td>:</td>
                    <td>
                        {{ $item->item }}
                    </td>
                </tr>
                <tr>
                    <td>QTY</td>
                    <td>:</td>
                    <td>
                        {{ $item->qty }}
                    </td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>:</td>
                    <td>Rp
                        {{ number_format($item->subtotal, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td>Total Price</td>
                <td>:</td>
                <td>Rp
                    {{ number_format($data->total, 0, ',', '.') }}
                </td>
            </tr>
        </table>
    </div>

</body>

<script>
    window.onload = () => {
        window.print();

        document.body.addEventListener('click', () => {
            window.location.href = "{{ route('main') }}";
        });
    };

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
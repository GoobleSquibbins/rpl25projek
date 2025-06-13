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

<body>
    @if (session('success'))
        <div class="notification_success" id="notification_s">
            <h1>Success</h1>
            <p>
                {{session('success')}}
            </p>
        </div>
    @endif

    <div class="delete_conf" id="deleteModal">
        <h1>Delete Item?</h1>
        <div class="del_btn">
            <button id="del">Delete</button>
            <button id="cancel">Cancel</button>
        </div>
    </div>

    <div class="main">
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
            <h1 class="title">RESIK LAUNDRY</h1>
            <table class="main_table">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->unit_type }}
                        </td>
                        <td>
                            Rp
                            {{ number_format($item->price, 0, ',', '.') }}
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            {{ $item->updated_at }}
                        </td>
                        <td>
                            <a href="{{ route('edit.item', ['item_id' => $item->item_id]) }}">Edit</a>
                            <br>
                            <a href="#" onclick="confirmDelete({{ $item->item_id }}); return false;">Delete</a>
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

    let selectedItemId = null;

    function confirmDelete(itemId) {
        selectedItemId = itemId;
        document.getElementById('deleteModal').style.display = 'block';
    }

    document.getElementById('cancel').addEventListener('click', function () {
        document.getElementById('deleteModal').style.display = 'none';
        selectedItemId = null;
    });

    document.getElementById('del').addEventListener('click', function () {
        if (selectedItemId) {
            window.location.href = `/delete_item/${selectedItemId}`;
        }
    });
</script>

</html>
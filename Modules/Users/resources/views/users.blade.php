<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Users</title>
</head>

<body>

    @if (session('success'))
        <div class="notification_success" id="notification_s">
            <h1>Success</h1>
            <p>{{session('success')}}</p>
        </div>
    @endif

    <div class="delete_conf" id="deleteModal">
        <h1>Delete User?</h1>
        <div class="del_btn">
            <button id="del">Delete</button>
            <button id="cancel">Cancel</button>
        </div>
    </div>

    <div class="main">
        <div class="sidebar">
            @if (Auth::user()->role == 'admin')
                <a class="sidebar_content" href="{{ route('main') }}">Transaction</a>
                <a class="sidebar_content" href="{{ route('user') }}" id="active">Users</a>
                <a class="sidebar_content" href="{{ route('speed') }}">Speed</a>
                <a class="sidebar_content" href="{{ route('item') }}">Item</a>
                <a class="sidebar_content" href="{{ route('report') }}">Report</a>
                <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
            @endif
            @if (Auth::user()->role == 'cashier')
                <a class="sidebar_content" id="active">Transaction</a>
                <a class="sidebar_content">Report</a>
                <a class="sidebar_content" href="{{ route('logout') }}">Logout</a>
            @endif
        </div>
        <div class="home_content">
            <a href="{{ route('register.user') }}" class="add_x">+ User</a>
            <h1 class="title">RESIK LAUNDRY</h1>
            <table class="main_table">
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>E-mail</th>
                    <th>Telephone</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
                @foreach ($data as $users)
                    <tr>
                        <td>
                            {{ $users->name }}
                        </td>
                        <td>
                            {{ $users->role }}
                        </td>
                        <td>
                            {{ $users->email }}
                        </td>
                        <td>
                            {{ $users->telephone }}
                        </td>
                        <td>
                            {{ $users->address }}
                        </td>
                        <td>
                            <a href="{{ route('show', ['user_id' => $users->user_id]) }}">Show</a>
                            <br>
                            <a href="{{ route('edit.user', ['user_id' => $users->user_id]) }}">Edit</a>
                            <br>
                            <a href="#" onclick="confirmDelete({{ $users->user_id }}); return false;">Delete</a>
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

    let selectedUserId = null;

    function confirmDelete(userId) {
        selectedUserId = userId;
        document.getElementById('deleteModal').style.display = 'block';
    }

    document.getElementById('cancel').addEventListener('click', function () {
        document.getElementById('deleteModal').style.display = 'none';
        selectedUserId = null;
    });

    document.getElementById('del').addEventListener('click', function () {
        if (selectedUserId) {
            window.location.href = `/delete_user/${selectedUserId}`;
        }
    });
</script>


</html>
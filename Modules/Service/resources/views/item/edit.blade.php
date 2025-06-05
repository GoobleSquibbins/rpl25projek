<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Edit Item</title>
</head>

<body>
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
        </div>
        <div class="home_content">
            <a href="{{ route('item')  }}" class="add_x">Back</a>
            <h1 class="title">EDIT ITEM</h1>
            <div class="card_user_create">
                <form action="{{ route('update.item', ['item_id' => $data->item_id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="item_id" value="{{$data->item_id}}">
                    <div class="form_item">
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Name" value="{{$data->name}}" id="name">
                    </div>
                    <div class="form_item">
                        <label for="unit_type">Type</label>
                        <input type="text" name="unit_type" placeholder="Type" value="{{$data->unit_type}}"
                            id="unit_type">
                    </div>
                    <div class="form_item">
                        <label for="price">Price</label>
                        <input type="text" name="price" placeholder="Price" value="{{$data->price}}" id="price">
                    </div>
                    <button class="btn_submit_create">Ok</button>
                </form>
            </div>
        </div>
    </div>


</body>

</html>
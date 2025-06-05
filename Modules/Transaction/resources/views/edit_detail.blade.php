<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Edit Transaction Item</title>
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
        </div>
        <div class="home_content">
            <a href="{{ url()->previous()  }}" class="add_x">Back</a>
            <h1 class="title">EDIT TRANSACTION</h1>
            <div class="card_user_create">
                <form action="{{ route('update.transaction.item', ['detail_id' => $data->detail_id]) }}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="detail_id" value="{{$data->detail_id}}">
                    <input type="hidden" name="transaction_id" value="{{$data->transaction_id}}">

                    <div class="form_item">
                        <label for="speed">Speed</label>
                        <select name="speed" id="speed">
                            @foreach ($speed as $s)
                                <option value="{{ $s->speed_id }}" {{ $s->speed == $data->speed ? 'selected' : '' }}>
                                    {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form_item">
                        <label for="item">Item</label>
                        <select name="item" id="item">
                            @foreach ($item as $i)
                                <option value="{{ $i->item_id }}" {{ $i->item == $data->item ? 'selected' : '' }}>
                                    {{ $i->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form_item">
                        <label for="qty">QTY</label>
                        <input type="number" id="qty" name="qty" value="{{ $data->qty }}">
                    </div>


                    <button class="btn_submit_create">Ok</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
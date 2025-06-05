<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Edit Transaction</title>
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
            <a href="{{  url()->previous()  }}" class="add_x">Back</a>
            <h1 class="title">EDIT TRANSACTION</h1>
            <div class="card_user_create">
                <form action="{{ route('update.transaction', ['transaction_id' => $data->transaction_id]) }}"
                    method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="transaction_id" value="{{$data->transaction_id}}">
                    <div class="form_item">
                        <label for="name">Name</label>
                        <input type="text" name="client_name" placeholder="Client Name" value="{{$data->client_name}}">
                    </div>
                    <div class="form_item">
                        <label for="notes">Notes</label>
                        <textarea name="notes" id="notes" cols="30" rows="10">{{ $data->notes }}</textarea>
                        <button class="btn_submit_create">Ok</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
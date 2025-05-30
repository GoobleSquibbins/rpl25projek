<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Add Transaction</title>
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
    </div>
    <div class="home_content">
        <a href="{{ route('main')  }}" class="add_x">Back</a>
        <h1>ADD TRANSACTION</h1>
        <div class="card_user_create">
            <form action="{{ route('store.transaction') }}" method="post" class="form_create_user">
            @csrf
                <div class="form_item">
                    <label for="client_name">Client Name</label>
                    <input type="text" id="client_name" name="client_name">
                </div>

                <div class="form_item">
                    <label for="speed">Speed</label>
                    <select name="speed" id="speed">
                        <option value="">How fast you want your shit done g?</option>
                        @foreach ($speed as $s)
                            <option value="{{ $s->speed_id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form_item">
                    <label for="item">Item</label>
                    <select name="item" id="item">
                        <option value="">What you want us to clean today lazy bum?</option>
                        @foreach ($item as $i)
                            <option value="{{ $i->item_id }}">{{ $i->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form_item">
                    <label for="qty">QTY</label>
                    <input type="number" id="qty" name="qty">
                </div>

                <div class="form_item">
                    <label for="notes">Notes</label>
                    <textarea name="notes" id="notes" cols="30" rows="10"></textarea>
                </div>

                <button class="btn_submit_create_transaction">Add Transaction</button>
            </form>
        </div>
    </div>
</body>

</html>
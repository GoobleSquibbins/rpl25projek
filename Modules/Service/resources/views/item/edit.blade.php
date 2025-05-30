<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Item</title>
</head>
<body class="user">
    <div class="container-card">
        <h1>Edit Item</h1>
        <form action="{{ route('update.item', ['item_id' => $data->item_id]) }}" method="post">
            {{ csrf_field() }}
                <input type="hidden" name="item_id" value="{{$data->item_id}}">
                <div class="txt_field">
                    <input type="text" name="name" placeholder="Name" value="{{$data->name}}">
                </div>
                <div class="txt_field">
                    <input type="text" name="unit_type" placeholder="Type" value="{{$data->unit_type}}">
                </div>
                <div class="txt_field">
                    <input type="text" name="price" placeholder="Price" value="{{$data->price}}">
                </div>
                <button class="btn-submit">Ok</button>
                <div class="error">
                        @if ($errors -> any())
                    @foreach ($errors->all() as $err)
                        <p>{{$err}}</p>
                    @endforeach
                    @endif
                </div>
        </form>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="user">
    <div class="container-card">
        <h1>Edit User</h1>
        <form action="{{ route('update.user', ['user_id' => $data->user_id]) }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value="{{$data->user_id}}">
                <div class="txt_field">
                    <input type="text" name="name" placeholder="Nama User" value="{{$data->name}}">
                </div>
                <div class="txt_field">
                    <input type="password" name="password" placeholder="Password (kosongkan jika tidak perlu)">
                </div>
                <div class="txt_field">
                    <input type="password" name="pass_confirm" placeholder="Konfirmasi Password">
                </div>
                <div class="txt_field">
                    <input type="text" name="role" placeholder="Email User" value="{{$data->role}}">
                </div>
                <div class="txt_field">
                    <input type="text" name="email" placeholder="Email User" value="{{$data->email}}">
                </div>
                <div class="txt_field">
                    <input type="text" name="telephone" placeholder="Telephone User" value="{{$data->telephone}}">
                </div>
                <div class="txt_field">
                    <input type="text" name="address" placeholder="Nama User" value="{{$data->address}}">
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
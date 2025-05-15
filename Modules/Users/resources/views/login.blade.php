<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
</head>

<body class="login">

    <div class="container_card_login">
        <h1>Login</h1>
        <form action="{{ route('login_proc') }}" method="post">
            @csrf
            <div class="txt_field">
                <input type="text" name="username" placeholder="Username">
            </div>
            <div class="txt_field">
                <input type="password" name="password" placeholder="Password">
            </div>
            <button class="btn-submit" type="submit">Login</button>
        </form>
        <!--  -->
    </div>
</body>

</html>
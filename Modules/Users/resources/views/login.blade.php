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
    @if (session('success'))
        <div class="notification_success" id="notification_s">
            <h1>Success</h1>
            <p>
                {{session('success')}}
            </p>
        </div>
    @endif

    <div class="container_card_login">
        <h1>Login</h1>
        <form action="{{ route('login_proc') }}" method="post">
            @csrf
            <div class="txt_field">
                <input type="text" name="username" value="{{ old('username') }}" placeholder="Username">
                @error('username')
                    <div class="error_message_login">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="txt_field">
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <div class="error_message_login">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="btn_container">
                <button class="btn-submit" type="submit">Login</button>

                @error('login')
                    <div class="error_message_login">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </form>
        <!--  -->
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
</script>

</html>
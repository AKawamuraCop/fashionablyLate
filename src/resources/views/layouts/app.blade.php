<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashionably Late</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__logo">
                <a class="header__logo-link" href="/">
                    Fashionably Late
                </a>
            </div>
            <nav class="header__nav">
                @if(Auth::check())
                <div class="logout__button">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="logout__button-submit">Logout</button>
                    </form>
                </div>
                @else
                    @if(Request::is('register'))
                        <div class="register__button">
                            <a class="login__button-submit" href="/login">Login</a>
                        </div>
                    @elseif(Request::is('login'))
                        <div class="register__button">
                            <a class="register__button-submit" href="/register">Register</a>
                    </div>
                    @endif
                @endif
            </nav>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>
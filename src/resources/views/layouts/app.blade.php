<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Test</title>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">

  @yield('css')
</head>

<body>
  <header class="header">
    <div class="header__inner">
      <a class="header__logo" href="#">
          FashonablyLate
      </a>
      <nav class="header-nav__button">
      @if(Auth::check())
        <form action="/logout" method="post">
          @csrf
            <input type="submit" value="logout">
        </form>
      @elseif(Request::is('login'))
        {{-- <a class="header-nav__login-button" href="/register">
          register
        </a> --}}
        <button onclick="location.href='/register'">register</button>
      @elseif(Request::is('register'))
        {{-- <a class="header-nav__login-button" href="/login">
          login
        </a> --}}
        <button onclick="location.href='/login'">login</button>
      @else
        <p></p>
      @endif
      </nav>
    </div>
  </header>

  <main>
    @yield('content')
  </main>
</body>

</html>
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection


@section('content')
<article class="login-main">
    <h2 class="login-title">Login</h2>
    <div class="login-body">
        <form action="/login" method="POST">
        @csrf
            <div class="login-body-email">
                @if($errors->has('email'))
                <ul class="login-body-email__errors">
                    @foreach($errors->get('email') as $em)
                    <li>{{$em}}</li>
                    @endforeach
                </ul>
                @endif
                <label for="login-body__your-mail" class="login-body__your-mail-label">メールアドレス</label>
                <input type="text" id="login-body__your-mail" name="email" value="{{old('email')}}">
            </div>
            <div class="login-body-password">
                @if($errors->has('password'))
                <ul class="login-body-password__errors">
                    @foreach($errors->get('password') as $em)
                    <li>{{$em}}</li>
                    @endforeach
                </ul>
                @endif
                <label for="login-body__your-password" class="login-body__your-password-label">パスワード</label>
                <input type="password" id="login-body__your-password" name="password" value="{{old('password')}}">
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</article>
@endsection
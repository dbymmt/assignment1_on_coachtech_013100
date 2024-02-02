@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection


@section('content')
<article class="auth-main">
    <h2 class="auth-title">Login</h2>
    <div class="auth-body">
        <form action="/login" method="POST">
        @csrf
            <div class="auth-body-mail">
                @if($errors->has('email'))
                <ul class="auth-body-mail__errors">
                    @foreach($errors->get('email') as $em)
                    <li>{{$em}}</li>
                    @endforeach
                </ul>
                @endif
                <label for="auth-body__your-mail" class="auth-body__your-mail-label">メールアドレス</label>
                <input type="text" id="auth-body__your-mail" name="email" value="{{old('email')}}">
            </div>
            <div class="auth-body-password">
                @if($errors->has('password'))
                <ul class="auth-body-password__errors">
                    @foreach($errors->get('password') as $em)
                    <li>{{$em}}</li>
                    @endforeach
                </ul>
                @endif
                <label for="auth-body__your-password" class="auth-body__your-password-label">パスワード</label>
                <input type="password" id="auth-body__your-password" name="password" value="{{old('password')}}">
            </div>
            <input class="auth-body-button" type="submit" value="Login">
        </form>
    </div>
</article>
@endsection
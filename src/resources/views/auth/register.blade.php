@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection


@section('content')
<article class="register-main">
    <h2 class="register-title">Register</h2>
    <div class="register-body">
        <form action="/register" method="POST">
        @csrf
            <div class="register-body-name">
                @if($errors->has('name'))
                <ul class="login-body-name__errors">
                    @foreach($errors->get('name') as $em)
                    <li>{{$em}}</li>
                    @endforeach
                </ul>
                @endif
                <label for="register-body_your-name" class="register-body_your-name-label" >お名前</label>
                <input type="text" id="register-body__your-name" name="name" value="{{old('name')}}">
            </div>
            <div class="register-body-mail">
                @if($errors->has('email'))
                <ul class="login-body-mail__errors">
                    @foreach($errors->get('email') as $em)
                    <li>{{$em}}</li>
                    @endforeach
                </ul>
                @endif
                <label for="register-body__your-mail" class="register-body__your-mail-label">メールアドレス</label>
                <input type="text" id="register-body__your-mail" name="email" value="{{old('email')}}">
            </div>
            <div class="register-body-password">
                @if($errors->has('password'))
                <ul class="login-body-password__errors">
                    @foreach($errors->get('password') as $em)
                    <li>{{$em}}</li>
                    @endforeach
                </ul>
                @endif
                <label for="register-body__your-password" class="register-body__your-password-label">パスワード</label>
                <input type="password" id="register-body__your-password" name="password" value="{{old('password')}}">
            </div>
            <input type="submit" value="登録">
        </form>
    </div>
</article>
@endsection
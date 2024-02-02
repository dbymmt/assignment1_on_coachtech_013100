@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection


@section('content')
<article class="auth-main">
    <h2 class="auth-title">Register</h2>
    <div class="auth-body">
        <form action="/register" method="POST">
        @csrf

            <div class="auth-body-name">
                @if($errors->has('name'))
                <ul class="auth-body-name__errors">
                    @foreach($errors->get('name') as $em)
                    <li>{{$em}}</li>
                    @endforeach
                </ul>
                @endif
                <label for="auth-body_your-name" class="auth-body_your-name-label" >お名前</label>
                <input type="text" id="auth-body__your-name" name="name" value="{{old('name')}}">
            </div>
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
            <input class="auth-body-button" type="submit" value="登録">

        </form>
    </div>
</article>
@endsection
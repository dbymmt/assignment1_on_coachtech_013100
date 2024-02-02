@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<article class="index-main">
    <h2 class="index-title">Contact</h2>
    @if ($errors->any())
    <ul class="errors">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="/" method="POST">
    @csrf
        <div class="index-body-name">
            <label for="index-body_your-first-name" class="index-body_your-first-name-label" >お名前</label>
                <input type="text" id="index-body_your-first-name" name="first_name" value="{{old('first_name')}}">
                <input type="text" id="index-body_your-last-name" name="last_name" value="{{old('last_name')}}">
        </div>
        
        <div class="index-body-gender">
            <label for="index-body_your-gender" class="index-body_your-gender-label" >性別</label>
                <label for="index-body_your-gender-man" class="index-body_your-gender-label" >男性</label>
                <input type="radio" id="index-body_your-gender-men" name="gender" value="1" {{ old('gender') === '1' ? 'checked' : '' }}>
                <label for="index-body_your-gender-woman" class="index-body_your-gender-label" >女性</label>
                <input type="radio" id="index-body_your-gender-women" name="gender" value="2" {{ old('gender') === '2' ? 'checked' : '' }}>
                <label for="index-body_your-gender-other" class="index-body_your-gender-label" >その他</label>
                <input type="radio" id="index-body_your-gender-other" name="gender" value="3" {{ old('gender') === '3' ? 'checked' : '' }}>
        </div>

        <div class="index-body-email">
            <label for="index-body_your-first-email" class="index-body_your-email-label" >メールアドレス</label>
            <input type="text" id="index-body_your-email" name="email" value="{{old('email')}}">
        </div>

        <div class="index-body-tel">
            <label for="index-body_your-tel" class="index-body_your-tel-label" >電話番号</label>
                <label for="index-body_your-tel-first" class="index-body_your-tel-label" ></label>
                <input type="text" id="index-body_your-tel-first" name="tel1" value="{{old('tel1')}}">
                <span>-</span>
                <label for="index-body_your-tel-second" class="index-body_your-tel-label" ></label>
                <input type="text" id="index-body_your-tel-second" name="tel2" value="{{old('tel2')}}">
                <span>-</span>
                <label for="index-body_your-tel-third" class="index-body_your-tel-label" ></label>
                <input type="text" id="index-body_your-tel-third" name="tel3" value="{{old('tel3')}}">
        </div>

        <div class="index-body-addoress">
            <label for="index-body_your-address" class="index-body_your-address-label" >住所</label>
            <input type="text" id="index-body_your-address" name="address" value="{{old('address')}}">
        </div>

        <div class="index-body-building">
            <label for="index-body_your-building" class="index-body_your-building-label" >建物名</label>
            <input type="text" id="index-body_your-building" name="building" value="{{old('building')}}">
        </div>

        <div class="index-body-category">
            <label for="index-body_your-category" class="index-body_your-category-label" >お問い合わせの種類</label>
            <select name="category_id">
                <option value="">選択してください</option>
                <option value="1" @if((int)old('category_id') === 1) selected @endif>商品のお届けについて</option>
                <option value="2" @if((int)old('category_id') === 2) selected @endif>商品の交換について</option>
                <option value="3" @if((int)old('category_id') === 3) selected @endif>商品トラブル</option>
                <option value="4" @if((int)old('category_id') === 4) selected @endif>ショップへのお問い合わせ</option>
                <option value="5" @if((int)old('category_id') === 5) selected @endif>その他</option>
            </select>
        </div>

        <div class="index-body-detail">
            <label for="index-body_your-detail" class="index-body_your-detail-label">お問い合わせの内容</label>
            <textarea name="detail" id="index-body_your-detail" cols="30" rows="10">{{old('detail')}}</textarea>
        </div>

        <input type="submit" value="確認画面">
    </form>
</article>
@endsection
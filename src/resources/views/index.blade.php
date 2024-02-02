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

    <section class="index-body-form">
    <form action="/" method="POST">
    @csrf
        <div class="index-body-name">
            <label for="index-body__first-name" class="index-body__first-name-label" >お名前</label>
            <div class="index-body__input-name">
                <input type="text" id="index-body__first-name" name="first_name" value="{{old('first_name')}}">
                <input type="text" id="index-body__last-name" name="last_name" value="{{old('last_name')}}">
            </div>
        </div>
        
        <div class="index-body-gender">
            <label for="index-body__gender" class="index-body__gender-label" >性別</label>
            <div class="index-body__input-gender">
                <input type="radio" id="index-body__gender-men" name="gender" value="1" {{ old('gender') === '1' ? 'checked' : '' }}>
                <label for="index-body__gender-man" class="index-body__gender-label" >男性</label>
                <input type="radio" id="index-body__gender-women" name="gender" value="2" {{ old('gender') === '2' ? 'checked' : '' }}>
                <label for="index-body__gender-woman" class="index-body__gender-label" >女性</label>
                <input type="radio" id="index-body__gender-other" name="gender" value="3" {{ old('gender') === '3' ? 'checked' : '' }}>
                <label for="index-body__gender-other" class="index-body__gender-label" >その他</label>
            </div>
        </div>

        <div class="index-body-email">
            <label for="index-body__first-email" class="index-body__email-label" >メールアドレス</label>
            <div class="index-body__input-email">
                <input type="text" id="index-body__email" name="email" value="{{old('email')}}">
            </div>
        </div>

        <div class="index-body-tel">
            <label for="index-body__tel" class="index-body__tel-label" >電話番号</label>
            <div class="index-body__input-tel">
                {{-- <label for="index-body__tel-first" class="index-body__tel-label" ></label> --}}
                <input type="text" id="index-body__tel-first" name="tel1" value="{{old('tel1')}}">
                <span>-</span>
                {{-- <label for="index-body__tel-second" class="index-body__tel-label" ></label> --}}
                <input type="text" id="index-body__tel-second" name="tel2" value="{{old('tel2')}}">
                <span>-</span>
                {{-- <label for="index-body__tel-third" class="index-body__tel-label" ></label> --}}
                <input type="text" id="index-body__tel-third" name="tel3" value="{{old('tel3')}}">
            </div>
        </div>

        <div class="index-body-addoress">
            <label for="index-body__address" class="index-body__address-label" >住所</label>
            <div class="index-body__input-address">
                <input type="text" id="index-body__address" name="address" value="{{old('address')}}">
            </div>
        </div>

        <div class="index-body-building">
            <label for="index-body__building" class="index-body__building-label" >建物名</label>
            <div class="index-body__input-building">
                <input type="text" id="index-body__building" name="building" value="{{old('building')}}">
            </div>
        </div>

        <div class="index-body-category">
            <label for="index-body__category" class="index-body__category-label" >お問い合わせの種類</label>
            <div class="index-body__input_category">
                <select name="category_id">
                    <option value="">選択してください</option>
                    <option value="1" @if((int)old('category_id') === 1) selected @endif>商品のお届けについて</option>
                    <option value="2" @if((int)old('category_id') === 2) selected @endif>商品の交換について</option>
                    <option value="3" @if((int)old('category_id') === 3) selected @endif>商品トラブル</option>
                    <option value="4" @if((int)old('category_id') === 4) selected @endif>ショップへのお問い合わせ</option>
                    <option value="5" @if((int)old('category_id') === 5) selected @endif>その他</option>
                </select>
            </div>
        </div>

        <div class="index-body-detail">
            <label for="index-body__detail" class="index-body__detail-label">お問い合わせの内容</label>
            <div class="index-body__input-detail">
                <textarea name="detail" id="index-body__detail" cols="30" rows="10">{{old('detail')}}</textarea>
            </div>
        </div>

        <input type="submit" value="確認画面">
    </form>
    </section>
</article>
@endsection
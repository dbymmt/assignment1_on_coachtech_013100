@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<article class="confirm-main">
    <h2 class="confirm-title">Confirm</h2>


    <form action="/create" method="POST">
    @csrf
        <dl class="confirm-body-form">
            <dt class="confirm-body__name-label" >お名前</dt>
            <dd class="confirm-body__name">{{ $data['first_name']." ".$data['last_name'] }}</dd>
            <input type="hidden" name="first_name" value="{{ $data['first_name'] }}">
            <input type="hidden" name="last_name" value="{{ $data['last_name'] }}">

            <dt class="confirm-body__gender-label" >性別</dt>
            <dd class="confirm-body__gender-men" >
                {{
                    $data['gender'] === 1 ? '男性' :
                    ($data['gender'] === 2 ? '女性' : 'その他')}}
            </dd>
            <input type="hidden" name="gender" value="{{ $data['gender'] }}">

            <dt class="confirm-body__email-label" >メールアドレス</dt>
            <dd class="confirm-body__email" >{{$data['email']}}</dd>
            <input type="hidden" name="email" value="{{ $data['email'] }}">

            <dt class="confirm-body__tel-label" >電話番号</dt>
            <dd class="confirm-body__tel">{{$data['tel1'].$data['tel2'].$data['tel3']}}</dd>
            <input type="hidden"  name="tel1" value="{{ $data['tel1'] }}">
            <input type="hidden"  name="tel2" value="{{ $data['tel2'] }}">
            <input type="hidden"  name="tel3" value="{{ $data['tel3'] }}">

            <dt class="confirm-body__address-label">住所</dt>
            <dd class="confirm-body__address">{{$data['address']}}</dd>
            <input type="hidden" name="address" value="{{ $data['address'] }}">

            <dt class="confirm-body__building-label">建物名</dt>
            <dd class="confirm-body__building">{{$data['building']}}</dd>
            <input type="hidden" name="building" value="{{ $data['building'] }}">

            <dt class="confirm-body__category-label" >お問い合わせの種類</dt>
            <dd class="confirm-body__category">
                {{$data['category_id'] === 1 ? '商品のお届けについて' :
                ($data['category_id'] === 2 ? '商品の交換について' :
                ($data['category_id'] === 3 ? '商品トラブル':
                ($data['category_id'] === 4 ? 'ショップへのお問い合わせ': 'その他')))}}
            </dd>
            <input type="hidden" name="category_id" value="{{ $data['category_id'] }}">

            <dt class="confirm-body__detail-label">お問い合わせの内容</dt>
            <dd class="confirm-body__detail">{{$data['detail']}}</dd>
            <input type="hidden" name="detail" value="{{ $data['detail'] }}">
        </dl>
        <div class="confirm-body__buttons">
            <input type="submit" value="送信">
            <input type="submit" name="back" value="修正">
        </div>
    </form>
</article>
@endsection
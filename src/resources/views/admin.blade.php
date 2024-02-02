@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
{{-- <script type="text/javascript" src="{{ asset('js/test.js') }}"></script> --}}
@endsection

@section('content')
<article class="admin-main">
    
    <section class="admin-header">
        Admin
    </section>
    
    <section class="admin-search-menu">
        <div class="admin-search-menu-main">
            <form action="/admin" method="GET">
            @csrf
                <input type="text" name="keyword" value="{{ request()->input('keyword') }} ">
                <select name="gender">
                    <option value="" {{ request()->input('gender') == "" ? 'selected' : '' }}>性別</option>
                    <option value="1" {{ request()->input('gender') == "1" ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request()->input('gender') == "2" ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request()->input('gender') == "3" ? 'selected' : '' }}>その他</option>
                </select>
                <select name="category_id">
                    <option value="" {{ request()->input('category_id') == "" ? 'selected' : '' }}>お問い合わせの種類</option>
                    <option value="1" {{ request()->input('category_id') == "1" ? 'selected' : '' }}>商品のお届けについて</option>
                    <option value="2" {{ request()->input('category_id') == "2" ? 'selected' : '' }}>商品の交換について</option>
                    <option value="3" {{ request()->input('category_id') == "3" ? 'selected' : '' }}>商品トラブル</option>
                    <option value="4" {{ request()->input('category_id') == "4" ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                    <option value="5" {{ request()->input('category_id') == "5" ? 'selected' : '' }}>その他</option>
                </select>
                <input type="date" name="date" value="{{ request()->input('date') }}">
                <input type="submit" value="検索">
                {{-- TODO リセット機能 --}}
                <button id="admin-search-menu-reset">リセット</button>
            </form>
        </div>
        <div class="admin-search-menu-sub">
            {{-- TODO CSV化機能 --}}
            <form>
                <button>エクスポート</button>
            </form>
            {{ $results->appends(request()->query())->links('vendor.pagination.simple-default') }}
        </div>
    </section>
    <section class="admin-result">
        <table class="admin-result-body">
            <tr class="admin-result-body__head">
                <th class="admin-result-body__head-elm">お名前</th>
                <th class="admin-result-body__head-elm">性別</th>
                <th class="admin-result-body__head-elm">メールアドレス</th>
                <th class="admin-result-body__head-elm" colspan="2">お問い合わせ種類</th>
            </tr>
            @if(!$results)
                <tr>
                    <td class="admin-result-body__NoData">No Data</td>
                </tr>
            @else
                @foreach($results as $result)
                    <tr id="admin-result-body__data1" data-tr="{{ $result->id }}">
                        <td>{{$result->first_name}} {{$result->last_name}}</td>
                        <td>{{$result->gender === 1 ? '男性' : 
                        ($result->gender === 2 ? '女性' : 'その他')}}</td>
                        <td>{{$result->email}}</td>
                        <td>{{$result->category_id === 1 ? '商品のお届けについて' : 
                        ($result->category_id === 2 ? '商品の交換について' : 
                        ($result->category_id === 3 ? '商品トラブル' : 
                        ($result->category_id === 4 ? 'ショップへのお問い合わせ' : 'その他')))}}</td>
                        <td><button onClick="openModal({{$result->id}})">詳細</button></td>
                    </tr>
                @endforeach
            @endif
        </table>
    </section>

    <section class="modal-frame">
    {{-- モーダルウィンドウ --}}
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="modal-close" onclick="closeModal()">&times;</span>
                <div id="modal-content">
                    <table class="modal-content__table">
                        <tr id="modal-content__table-id">
                            <th>テスト</th>
                            <td></td>
                        </tr>
                        <tr class="modal-content__table-name">
                            <th>お名前</th>
                            <td></td>
                        </tr>
                        <tr class="modal-content__table-gender">
                            <th>性別</th>
                            <td></td>
                        </tr>
                        <tr class="modal-content__table-email">
                            <th>メールアドレス</th>
                            <td></td>
                        </tr>
                        <tr class="modal-content__table-address">
                            <th>住所</th>
                            <td></td>
                        </tr>
                        <tr class="modal-content__table-building">
                            <th>建物名</th>
                            <td></td>
                        </tr>
                        <tr class="modal-content__table-category">
                            <th>お問い合わせの種類</th>
                            <td></td>
                        </tr>
                        <tr class="modal-content__table-detail">
                            <th>お問い合わせ内容</th>
                            <td>
                                
                            </td>
                        </tr>
                        <tr class="modal-content__table-button">
                            <td colspan="2">
                                <button id="modal-content__table-button-column-delete">削除</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
</article>

<script type="text/javascript" src="{{ asset('js/test.js') }}"></script>

@endsection
@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2 class="admin-title">Admin</h2>
    </div>
    <form class="search-form" action="/contacts/search" method="get">
        @csrf
    <div class="search-form-inner">
        <input class="search-form--text" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください">
        <select class="select-gender" name="gender">
            <option value="" disabled selected>性別</option>
            <option value="1">男性</option>
            <option value="2">女性</option>
            <option value="3">その他</option>
        </select>
        <select class="search-form--select-contact" name="category_id">
            <option value="" disabled selected>問い合わせの種類</option>
            @foreach($categories as $category)
            <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
            @endforeach
        </select>
        <input class="search-form--date"  type="date" name="date">
        <button class="form__button-search" type="submit">検索</button>
        <button class="form__button-reset" type="reset">リセット</button>
    </div>
</form>
    <div class="action-buttons">
        <form class="export-form" action="/contacts/export" method="get">
        <button class="export__button" type="submit">エクスポート</button>
        </form>
        <div class="pagination">
            {{ $contacts->links('vendor.pagination.default') }}
        </div>
    </div>

    <div class="contact-table">
        <table class="contact-table__inner">
            <tr class="contact-table__row">
                <th class="contact-table__header">お名前</th>
                <th class="contact-table__header">性別</th>
                <th class="contact-table__header">メールアドレス</th>
                <th class="contact-table__header">お問い合わせの種類</th>
                <th class="contact-table__header"></th>
            </tr>
            @foreach($contacts as $contact)
            <form action="modal" method="post">
                <tr class="contact-table__row">
                    <input type="hidden" name="id" value="{{ $contact['id'] }}">
                    <td class="contact-table__text">{{ $contact['first_name'] }} {{ $contact['last_name'] }}</td>
                    @if($contact['gender'] == 1)
                    <td class="contact-table__text">男性</td>
                    @elseif(($contact['gender'] == 2))
                    <td class="contact-table__text">女性</td>
                    @else
                    <td class="contact-table__text">その他</td>
                    @endif
                    <td class="contact-table__text">{{ $contact['email'] }}</td>
                    <td class="contact-table__text">{{ $contact['category']['content']}}</td>
                    <td><button class="form__detail-button-submit" type="submit">詳細<button></td>
                </tr>
            </form>
            @endforeach
        </table>
    </div>
</div>
@endsection


@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2 class="admin-title">Confirm</h2>
    </div>
    <form class="form" action="/contacts" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table_inner">
                <tr class="confirm-table-row">
                    <th class="confirm-table-head">お名前</th>
                    <td class="confirm-table-data">
                        {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                    </td>
                </tr>
                <tr  class="confirm-table-row">
                    <th class="confirm-table-head">性別</th>
                    <td class="contact-table__text">
                        @if($contact['gender'] == 1)
                            男性
                        @elseif(($contact['gender'] == 2))
                            女性
                        @else
                            その他
                        @endif
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <th class="confirm-table-head">メールアドレス</th>
                    <td class="confirm-table-data">
                        {{ $contact['email'] }}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" readonly/>
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <th class="confirm-table-head">電話番号</th>
                    <td class="confirm-table-data">
                        {{ $contact['tell1'] }} - {{ $contact['tell2'] }} - {{ $contact['tell3'] }}
                        <input type="hidden" name="tell1" value="{{ $contact['tell1'] }}" />
                        <input type="hidden" name="tell2" value="{{ $contact['tell2'] }}" />
                        <input type="hidden" name="tell3" value="{{ $contact['tell3'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <th class="confirm-table-head">住所</th>
                    <td class="confirm-table-data">
                        {{ $contact['address'] }}
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <th class="confirm-table-head">建物名</th>
                    <td class="confirm-table-data">
                        @if($contact['building'] != null)
                        {{ $contact['building'] }}
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" readonly />
                        @endif
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <th class="confirm-table-head">お問い合わせの種類</th>
                    <td class="confirm-table-data">
                        {{ $category }}
                        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}" readonly/>
                    </td>
                </tr>
                <tr class="confirm-table-row">
                    <th class="confirm-table-head">お問い合わせ内容</th>
                    <td class="confirm-table-data">
                        {{ $contact['detail'] }}
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
        </div>
        <div class="buttons">
            <button class="confirm-submit-button" type="submit" name='complete' value="complete">送信</button>
            <button class="confirm-submit-button" type="submit" name='back' value="back">修正</button>
        </div>
    </form>
</div>
@endsection
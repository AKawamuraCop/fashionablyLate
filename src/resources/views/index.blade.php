@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="admin__content">
    <div class="admin__heading">
        <h2 class="admin-title">Contact</h2>
    </div>

    <form class="contact-form" action="/contacts/confirm" method="post">
        @csrf
        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">お名前 </span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" >
                    <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" >
                </div>
                <div class="form__error">
                @error('last_name')
                {{ $message }}
                @enderror
                </div>
                <div class="form__error">
                @error('first_name')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <div class="gender-radio">
                        <input type="radio" name="gender" value="1" {{ old('gender', '1') == '1' ? 'checked' : '' }} />
                        <span class="form__label--gender">男性</span>
                        <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }} />
                        <span class="form__label--gender">女性</span>
                        <input type="radio" name="gender" value="3" {{ old('gender') == '3' ? 'checked' : '' }} />
                        <span class="form__label--gender">その他</span>
                    </div>
                </div>
                <div class="form__error">
                @error('gender')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス </span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--email">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                @error('email')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--tel">
                    <input type="tel" name="tell1" placeholder="080" maxlength="3" value="{{ old('tell1') }}" >
                    <input type="tel" name="tell2" placeholder="1234" maxlength="4" value="{{ old('tell2') }}">
                    <input type="tel" name="tell3" placeholder="5678" maxlength="4" value="{{ old('tell3') }}">
                </div>
                <div class="form__error">
                @error('tel')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">住所 </span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--address">
                    <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </div>
                <div class="form__error">
                @error('address')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--building">
                    <input type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--category">
                    <select name="category_id">
                        <option value="" disabled selected>選択してください</option>
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}" {{ old('category_id') == $category['id'] ? 'selected' : '' }}>
                                {{ $category['content'] }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                @error('category_id')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--contact">
                    <textarea name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}"></textarea>
                </div>
                <div class="form__error">
                @error('detail')
                {{ $message }}
                @enderror
                </div>
            </div>
        </div>
        <div class="form-contact__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
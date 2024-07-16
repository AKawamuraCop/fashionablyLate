@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="form-register__content">
    <div class="form-register__heading">
        <h2 class="form-register-title">Register</h2>
    </div>
    <form class="form-register" action="/register" method="post">
        @csrf
        <div class="form-register__group">
            <div class="form-register__group-title">
                <span class="form-register__label--item">お名前</span>
            </div>
            <div class="form-register__group-content">
                <div class="form-register__input--text">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="例:山田  太郎"/>
                </div>
                <div class="form__error">
                    @error('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-register__group">
            <div class="form-register__group-title">
                <span class="form-register__label--item">メールアドレス</span>
            </div>
            <div class="form-register__group-content">
                <div class="form-register__input--text">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com"/>
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-register__group">
            <div class="form-register__group-title">
                <span class="form-register__label--item">パスワード</span>
            </div>
            <div class="form-register__group-content">
                <div class="form-register__input--text">
                    <input type="password" name="password" placeholder="例:coachtech001"/>
                </div>
                <div class="form__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-register__button">
            <button class="form-register__button-submit" type="submit">登録</button>
        </div>
    </form>
</div>
@endsection
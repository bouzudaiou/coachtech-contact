@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2>管理者用ログインページ</h2>
      </div>
      <form action="/login" method="POST" >
        @csrf
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
            </div>
                <div class="form__error">
                   @error('email')
                   {{ $message }}
                  @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">パスワード</span>
            <span class="form__label--required">必須</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input type="password" name="password"  />
            </div>
                <div class="form__error">
                   @error('password')
                   {{ $message }}
                   @enderror
            </div>
          </div>
        </div>
              <div class="form__button">
          <button class="form__button-submit" type="submit">login</button>
        </div>
      </form>
    </div>
@endsection
@extends('layouts.index')
@section('title','ログイン')
@section('main')

<div class="form_card">
  <p class="login_title">ログイン</p>
  @error('password')
  <span class="error_message">メールアドレス、またはパスワードが違います</span>
  @enderror

  @if (session('status'))
  <span class="error_message">{{ session('status') }}</span>
  @endif
  <form class="login_form" action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
    <input type="text" placeholder="パスワード" name="password">
    <button type="submit" class="btn">ログイン</button>
  </form>
  <a href="{{ route('register') }}">アカウントをお持ちでない方は<span>こちら</span></a>
</div>

@endsection
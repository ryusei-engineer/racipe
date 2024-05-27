@extends('layouts.index')
@section('title','新規登録')
@section('main')

<div class="form_card">
  <p class="login_title">新規登録</p>
  <form class="login_form" action="{{ route('register') }}" method="post">
    @csrf
    <input type="text" placeholder="ユーザー名" name="name" value="{{ old('name') }}">
    @error('name')
  <span class="error_message">ユーザー名は25文字で入力してください</span>
  @enderror
    <input type="text" placeholder="メールアドレス" name="email" value="{{ old('email') }}">
    @error('email')
  <span class="error_message">このメールアドレスはすでに使用されています</span>
  @enderror
    <input type="text" placeholder="パスワード" name="password">
    <label class="consent">
      <input type="checkbox" name="agreement" value="1">
      <span><a href="{{ route('terms') }}">利用規約</a>と<a href="{{ route('privacy_policy') }}">プライバシーポリシー</a>に同意する</span>
    </label>
    @error('agreement')
  <span class="error_message">利用規約とプライバシーポリシーに同意して下さい</span>
  @enderror
    
    
    <button type="submit" class="btn">新規登録</button>
  </form>
  <a href="{{ route('login') }}">すでにアカウントをお持ちの方は<span>こちら</span></a>
</div>

@endsection
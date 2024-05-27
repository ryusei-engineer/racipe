@extends('layouts.index')
@section('ittle','プロフィール')
@section('main')

<div class="mypage_card">
  <p class="mypage_title">プロフィール
  </p>
  <a href="{{ route('profile_edit') }}">変更・削除する</a>
  @isset(\Auth::user()->path)
  <img src="{{ Storage::url(\Auth::user()->path) }}" alt="">
  @endisset
  @empty(\Auth::user()->path)
  <img class="default" src="{{ asset('img/user-line.svg') }}" alt="">
  @endempty
  <p class="username">{{ $username }}</p>
  <a class="btn" href="{{ route('myrecipes') }}">投稿したレシピを編集</a>
  <form action="{{ route('logout') }}" onSubmit="return logout_check()" method="post">
    @csrf
    <button class="logout" type="submit">ログアウト</button>
  </form>
</div>

<script src="{{ asset('js/mypage.js') }}"></script>
@endsection

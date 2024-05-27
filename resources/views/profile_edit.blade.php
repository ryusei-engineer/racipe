@extends('layouts.index')
@section('title','プロフィール変更')
@section('main')

<div class="login_card profile_card">
  <p class="login_title">プロフィール</p>

  <form class="login_form mypage_card" action="{{ route('update') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="icon_img">
      <input class="icon_img" type="file" name="image" id="icon_img">
      <span>+アイコンを変更</span>
    </label>
    @isset(\Auth::user()->path)
    <img id="before_icon" src="{{ Storage::url(\Auth::user()->path) }}" alt="">
    @endisset
    <img class="preview" id="preview_icon" src="" alt="プレビュー画像" style="display: none;">
    @empty(\Auth::user()->path)
    <img id="unselected_icon" class="default" src="{{ asset('img/user-line.svg') }}" alt="">
    @endempty
    
    <label for="">
    ユーザー名
      <input type="text" placeholder="ユーザー名" name="name" value="{{ $user->name }}">
    </label>

    <label for="">
    メールアドレス
      <input type="text" placeholder="メールアドレス" name="email" name="name" value="{{ $user->email }}">
    </label>
    
    
    <button type="submit" class="btn">変更する</button>
  </form>
</div>

<form class="user_delete_form" action="{{ route('user.delete') }}" onSubmit="return delete_check()" method="post">
  @csrf
  @method('delete')
  <button class="user_delete" type="submit">アカウントを削除</button>
</form>

<script src="{{ asset('js/profile_edit.js') }}"></script>

@endsection
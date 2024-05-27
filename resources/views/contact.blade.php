@extends('layouts.index')
@section('title','お問い合わせ')
@section('main')

<div class="form_card">
  <p class="contact_title">お問い合わせ</p>
  <form class="contact_card" action="{{ route('contact.store') }}" method="post">
    @csrf
    <div class="contact_detail">
    <p>お名前</p>
    <input class="contacts" name="name" type="text" placeholder="お名前を入力して下さい" value="{{ old('name') }}">
    @error('name')
    <span>お名前を入力して下さい</span>
    @enderror
    </div>
    
    <div class="contact_detail">
    <p>メールアドレス</p>
    <input class="contacts" name="email" type="text" placeholder="メールアドレスを入力して下さい" value="{{ old('email') }}">
    @error('email')
    <span>メールアドレスを入力して下さい</span>
    @enderror
    </div>

    <div class="contact_detail">
    <p>お問い合わせ</p>
    <textarea class="contacts" name="content" type="text" placeholder="お問い合わせ内容を入力して下さい">{{ old('content') }}</textarea>
    @error('content')
    <span>お問い合わせ内容を入力して下さい</span>
    @enderror
    </div>
    
    
    <button type="submit" class="btn">送信する</button>
  </form>
</div>

@endsection
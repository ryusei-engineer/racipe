@extends('layouts.index')
@section('ittle','お問い合わせ一覧')
@section('main')
@if(\Auth::user()->role == "admin")
  <div class="contacts">
  <p class="admin1016_title">お問い合わせ一覧</p>
  @foreach($contacts as $contact)
  <div class="contact">
    <p>お名前：{{ $contact->name }}</p>
    <p>メールアドレス：{{ $contact->email }}</p>
    <p>お問い合わせ内容:{{ $contact->content }}</p>
    <p>{{ $contact->created_at }}</p>
  </div>
  @endforeach
  @if($contacts->isEmpty())
  <p class="empty">お問い合わせはありません</p>
  @endif
  </div>
@else
<p class="empty">管理者専用ページです</p>
@endif

@endsection

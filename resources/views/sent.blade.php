@extends('layouts.index')
@section('ittle','お問い合わせ')
@section('main')
<div class="sent">
  <p>お問い合わせを送信しました</p>
  <span>確認が出来次第、ご連絡いたします。</span>
  <a class="btn" href="{{ route('index') }}">ホームへ</a>
</div>

@endsection

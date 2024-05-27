@extends('layouts.index')
@section('ittle','Racipe')
@section('main')

<div class="main_title">
  <p>ラクにつくれる<br>レシピをシェアしよう</p>
  <h2>Racipe</h2>
  @guest
  <a class="btn" href="{{ route('login') }}">ログイン</a>
  @endguest
</div>

<div class="container">
  <div class="recipes_container">
  <h2>レシピ</h2>
  <div class="recipes">
    <!-- レシピカード -->
    @foreach($recipes as $recipe)
    <a href="{{ route('recipe',['id' => $recipe->id]) }}">
      <div class="recipe">
      <img src="{{ Storage::url($recipe->cooking_img1) }}" alt="">
      <div class="detail">
        <div>
          <p class="title">{{ $recipe->title }}</p>
          <span  class="rakudo">ラク度{{ $recipe->rakudo_avg }}</span>
        </div>
        <div>
          <p  class="ingredient">{{ $recipe->ingredient }}</p>
          <div class="time_div">
            <span class="time">{{ $recipe->time }}分</span>
          </div>
        </div>
      </div>
    </div>
    </a>
    @endforeach
    <a class="more" href="{{ route('recipes') }}">もっと見る</a>

  </div>
</div>

</div>

<footer>
  <a href="{{ route('terms') }}">利用規約</a>
  <a href="{{ route('privacy_policy') }}">プライバシーポリシー</a>
  <a href="{{ route('contact') }}">お問い合わせ</a>
  <p class="copy_right">&copy; 2024 keino All right reserved</p>
</footer>

@endsection

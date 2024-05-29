@extends('layouts.index')
@section('title','公開中のレシピ')
@section('main')

<div class="container">
<div class="recipes_container favorite_recipes">
  <h2>レシピを編集</h2>
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
    @if($recipes->isEmpty())
    <p class="no_favorite">投稿済のレシピはありません</p>
    @endif


  </div>
</div>
</div>

@endsection

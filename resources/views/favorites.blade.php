@extends('layouts.index')
@section('title','お気に入り')
@section('main')

<div class="container">
<div class="recipes_container favorite_recipes">
  <h2>お気に入り</h2>
  <div class="recipes">
    <!-- レシピカード -->
    

    @isset($recipes)
    @foreach($recipes as $recipe)
    <a href="{{ route('recipe',['id' => $recipe->id]) }}">
      <div class="recipe">
      <img src="{{ Storage::url($recipe->cooking_img1) }}" alt="">
      <div class="detail">
        <div>
          <p class="title">{{ $recipe->title }}</p>
          <span  class="rakudo">ラク度３</span>
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
    @else
    <p class="no_favorite">お気に入りのレシピはありません</p>
    @endisset


    

  </div>
</div>
</div>


@endsection

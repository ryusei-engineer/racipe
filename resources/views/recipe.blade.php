@extends('layouts.index')
@section('title',$recipe->title . "のレシピ詳細")
@section('main')
<div class="pc_recipe_container">
  <div class="carousel">
    <div class="wrapper">

      <span id="prev" class="prev"><img src="{{ asset('img/arrow-left-s-line.svg') }}" alt=""></span>
      <span id="next" class="next"><img src="{{ asset('img/arrow-right-s-line.svg') }}" alt=""></span>

      <div id="slider" class="slider slider1">
        <div class="content content1">
          <img  src="{{ Storage::url($recipe->cooking_img1) }}" alt="">
        </div>
          @isset($recipe->cooking_img2)
        <div class="content content2">
          <img  src="{{ Storage::url($recipe->cooking_img2) }}" alt="">
        </div>
        @endisset
          @isset($recipe->cooking_img3)
            <div class="content content3">
              <img  src="{{ Storage::url($recipe->cooking_img3) }}" alt="">
            </div>
          @endisset
        @isset($recipe->cooking_img4)
          <div class="content content4">
            <img  src="{{ Storage::url($recipe->cooking_img4) }}" alt="">
          </div>
        @endisset
      </div>
    </div>
  </div>

  <div>
  <div class="recipe_procedure">
    <span class="rakudo">ラク度{{ $recipe->rakudo_avg }}</span>
    <p class="recipe_title">{{ $recipe->title }}</p>
    <span class="time">調理時間</span>
    <span >{{ $recipe->time }}分</span>

    <div class="recipe_ingredient">
      <p>材料</p>
      <pre>
{{ $recipe->ingredient }}
      </pre>

      <p>調理手順</p>
      <pre>
{{ $recipe->procedure }}
      </pre>
    </div>

    <form class="rakudo_card" action="{{ route('recipe.evaluate') }}" method="post">
      @csrf
    @Auth
    <input name="user_id" type="hidden" value="{{ \Auth::user()->id }}">
    @endauth
    <input name="recipe_id" type="hidden" value="{{ $recipe->id }}">
        <p>ラク度を評価</p>
        <div class="heading">
          <span>ムズかしい</span>
          <span>ラク</span>
        </div>
        <div class="stars">
          <span>
            <input id="rakudo5" type="radio" name="rakudo" value="5" {{ isset($recipe_rakudo) && $recipe_rakudo->rakudo == 5 ? 'checked' : '' }}><label for="rakudo5">★</label>
            <input id="rakudo4" type="radio" name="rakudo" value="4" {{ isset($recipe_rakudo) && $recipe_rakudo->rakudo == 4 ? 'checked' : '' }}><label for="rakudo4">★</label>
            <input id="rakudo3" type="radio" name="rakudo" value="3" {{ isset($recipe_rakudo) && $recipe_rakudo->rakudo == 3 ? 'checked' : '' }}><label for="rakudo3">★</label>
            <input id="rakudo2" type="radio" name="rakudo" value="2" {{ isset($recipe_rakudo) && $recipe_rakudo->rakudo == 2 ? 'checked' : '' }}><label for="rakudo2">★</label>
            <input id="rakudo1" type="radio" name="rakudo" value="1" {{ isset($recipe_rakudo) && $recipe_rakudo->rakudo == 1 ? 'checked' : '' }}><label for="rakudo1">★</label>
          </span>
        </div>
        <button class="btn" type="submit">評価する</button>
        <button class="btn favorite_btn" type="submit" name="is_favorite" value="{{ isset($recipe_rakudo) && $recipe_rakudo->is_favorite == 1 ? 0 : 1 }}">
          @if( isset($recipe_rakudo) && $recipe_rakudo->is_favorite == 1)
          <img src="{{ asset('img/bookmark-fill.svg') }}" alt="">お気に入り済
          @else
        <img src="{{ asset('img/bookmark-line-white.svg') }}" alt="">お気に入り
      @endif</button>

    </form>


    <div class="contributor">
      <span>投稿者</span>
      <div>
        @if($recipe_user->path)
          <img src="{{ Storage::url($recipe_user->path) }}" alt="">
        @else
          <img class="default" src="{{ asset('img/user-line.svg') }}" alt="">
        @endif
      <p>{{ $recipe_user->name }}</p>
      </div>

    </div>

  </div>

  @auth
  @if($recipe->user_id == \Auth::user()->id)
  <a class="btn edit_btn" href="{{ route('edit',['id' => $recipe->id]) }}">レシピを編集</a>
  <form class="recipe_delete" onSubmit="return delete_check()" action="{{ route('recipe.delete',['recipe_id' => $recipe->id]) }}"  method="post">
    @csrf
    @method('delete')
    <button type="submit" class="recipe_delete_btn">レシピを削除</button>
  </form>
  @endif
  @endauth
  </div>
</div>
<script src="{{ asset('js/recipe.js') }}"></script>
@endsection

@extends('layouts.index')
@section('ittle','マイレシピ')
@section('main')
<p class="recipe_success">レシピを投稿しました</p>
<div class="myrecipe_rakudo">
  <p>投稿したレシピのラク度を設定</p>
  <span>ラク度はみんなの評価で都度変わります</span>
</div>
<form class="rakudo_card" action="{{ route('recipe.evaluate') }}" method="post">
      @csrf
    @Auth
    <input name="user_id" type="hidden" value="{{ \Auth::user()->id }}">
    @endauth
    <input name="recipe_id" type="hidden" value="{{ $recipe->id }}">
        <p>ラク度を評価</p>
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
        
    </form>
@endsection

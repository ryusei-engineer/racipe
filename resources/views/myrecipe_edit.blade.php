@extends('layouts.index')
@section('title','レシピを投稿')
@section('main')

<form class="form_create" action="{{ route('recipe.store') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="img_inputs">
  <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
    <div>
      <label class="img_input" for="cooking_img1">
        <input type="file" name="image1" id="cooking_img1" value="{{ old('image1') }}">
        <div>
          <img src="{{ asset('img/camera-line.svg') }}" alt="">
          <span>写真を選択</span>
        </div>
        <span>１枚目</span>
      </label>
      <label class="img_input" for="cooking_img2">
      <input type="file" name="image2" id="cooking_img2" value="{{ old('image2') }}">
        <div>
          <img src="{{ asset('img/camera-line.svg') }}" alt="">
          <span>写真を選択</span>
        </div>
        <span>２枚目</span>
      </label>
    </div>

    <div>
    <label class="img_input" for="cooking_img3">
    <input type="file" name="image3" id="cooking_img3" value="{{ old('image3') }}">
        <div>
          <img src="{{ asset('img/camera-line.svg') }}" alt="">
          <span>写真を選択</span>
        </div>
        <span>３枚目</span>
      </label>
      <label class="img_input" for="cooking_img4">
      <input type="file" name="image4" id="cooking_img4" value="{{ old('image4') }}">
        <div>
          <img src="{{ asset('img/camera-line.svg') }}" alt="">
          <span>写真を選択</span>
        </div>
        <span>４枚目</span>
      </label>
    </div>
    @error('image1')
    <span class="error_message">1枚目の写真は必須です</span>
    @enderror

  </div>

  <div class="recipe_detail">
    <label class="recipe_title" for="">
    タイトル
    <input type="text" name="title" placeholder="例：簡単ポテトサラダ" value="{{ old('title') }}">
    </label>
    @error('title')
    <span class="error_message">タイトルを入力してください</span>
    @enderror
  </div>

  <div class="recipe_detail">
    <label  class="recipe_title" for="">
    材料
    <textarea class="ingredient" name="ingredient" id="" placeholder="・ジャガイモ(1個)
・ハム(お好みの量)
・きゅうり(お好みの量)
・マヨネーズ(適量)
・塩と胡椒(適量)">{{ old('ingredient') }}</textarea>
    </label>
  </div>
    @error('ingredient')
    <span class="error_message">材料を入力してください</span>
    @enderror

  <div class="recipe_detail">
    <label class="recipe_title" for="">
      調理手順
    <textarea class="procedure" name="procedure" id="" placeholder="手順1.じゃがいもを皮付きのまま加熱しやすい大きさに切る(写真２枚目くらいの大きさ)
手順2.じゃがいもを600Wで6分加熱(柔らかくなければ３０秒づつ加熱)
手順3.柔らかくなったじゃがいもをつぶし、粗熱をとる
手順4.ハム、きゅうりを好みの大きさにカット
手順5ハム、きゅうり、マヨネーズ、塩、胡椒を混ぜて完成">{{ old('procedure') }}</textarea>
    </label>
  </div>
  @error('procedure')
  <span class="error_message">調理手順を入力してください</span>
  @enderror

  <div class="recipe_detail">
    <label class="recipe_title" for="">
    調理時間
    <div>
      <input class="time" type="number" name="time" placeholder="10" value="{{ old('time') }}">
      <span>分</span>
    </div>
    @error('time')
    <span class="error_message">調理時間を入力してください</span>
    @enderror
    
    </label>
    <select class="category" name="category_id">
        <option value="1" {{ old('category_id') == 1 ? 'selected' : ''}}>全て</option>
        <option value="2" {{ old('category_id') == 2 ? 'selected' : ''}}>お肉</option>
        <option value="3" {{ old('category_id') == 3 ? 'selected' : ''}}>魚介類</option>
        <option value="4" {{ old('category_id') == 4 ? 'selected' : ''}}>野菜</option>
        <option value="5" {{ old('category_id') == 5 ? 'selected' : ''}}>汁物</option>
        <option value="6" {{ old('category_id') == 6 ? 'selected' : ''}}>麺類</option>
        <option value="7" {{ old('category_id') == 7 ? 'selected' : ''}}>ご飯もの</option>
        <option value="8" {{ old('category_id') == 8 ? 'selected' : ''}}>お菓子</option>
        <option value="9" {{ old('category_id') == 9 ? 'selected' : ''}}>その他</option>
    </select>
  </div>
  
  <button class="btn" type="submit">投稿する</button>
</form>
@endsection

@extends('layouts.index')
@section('ittle','レシピを編集')
@section('main')

<form class="form_create" action="{{ route('edit_store',[ 'id' => $recipe->id]) }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="img_inputs">
  <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
    <div>

      <label class="img_input" id="select_img1" for="cooking_img1">
        @isset($recipe->cooking_img1)
        <img class="preview" id="unselected1" src="{{ Storage::url($recipe->cooking_img1) }}" alt="" style="max-width: 100%; height: auto;">
        <input type="file" name="image1" id="cooking_img1">
        <img class="preview" id="preview1" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
        @else
        <input type="file" name="image1" id="cooking_img1" value="{{ old('image1') }}">
        <div id="unselected1">
          <img src="{{ asset('img/camera-line.svg') }}" alt="">
          <span>写真を選択</span>
        </div>
        <span id="unselected_num1">１枚目</span>
        <img class="preview" id="preview1" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
        @endisset
      </label>

      <label class="img_input" id="select_img2" for="cooking_img2">
        @isset($recipe->cooking_img2)
        <img class="preview" id="unselected2" src="{{ Storage::url($recipe->cooking_img2) }}" alt="" style="max-width: 100%; height: auto;">
        <input type="file" name="image2" id="cooking_img2" value="{{ old('image2') }}">
        <img class="preview" id="preview2" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
        @else
        <input type="file" name="image2" id="cooking_img2" value="{{ old('image2') }}">
        <div id="unselected2">
          <img src="{{ asset('img/camera-line.svg') }}" alt="">
          <span>写真を選択</span>
        </div>
        <span id="unselected_num2">２枚目</span>
        <img class="preview" id="preview2" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
        @endisset
      </label>
    </div>

    <div>
    <label class="img_input" id="select_img3" for="cooking_img3">
        @isset($recipe->cooking_img3)
        <img class="preview" id="unselected3" src="{{ Storage::url($recipe->cooking_img3) }}" alt="" style="max-width: 100%; height: auto;">
        <input type="file" name="image3" id="cooking_img3" value="{{ old('image3') }}">
        <img class="preview" id="preview3" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
        @else
        <input type="file" name="image3" id="cooking_img3" value="{{ old('image3') }}">
        <div id="unselected3">
          <img src="{{ asset('img/camera-line.svg') }}" alt="">
          <span>写真を選択</span>
        </div>
        <span id="unselected_num3">３枚目</span>
        <img class="preview" id="preview3" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
        @endisset
      </label>

      <label class="img_input" id="select_img4" for="cooking_img4">
        @isset($recipe->cooking_img4)
        <img class="preview" id="unselected4" src="{{ Storage::url($recipe->cooking_img4) }}" alt="" style="max-width: 100%; height: auto;">
        <input type="file" name="image4" id="cooking_img4" value="{{ old('image4') }}">
        <img class="preview" id="preview4" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
        @else
        <input type="file" name="image4" id="cooking_img4" value="{{ old('image4') }}">
        <div id="unselected4">
          <img src="{{ asset('img/camera-line.svg') }}" alt="">
          <span>写真を選択</span>
        </div>
        <span id="unselected_num4">４枚目</span>
        <img class="preview" id="preview4" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
        @endisset
      </label>
    </div>
    @error('image1')
    <span class="error_message">1枚目の写真は必須です</span>
    @enderror

  </div>

  <div class="recipe_detail">
    <label class="recipe_title" for="">
    タイトル
    <input type="text" name="title" placeholder="例：簡単ポテトサラダ" value="{{ old('title') ? old('title') : $recipe->title}}">
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
・塩と胡椒(適量)">{{ old('ingredient') ? old('ingredient') : $recipe->ingredient}}</textarea>
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
手順5ハム、きゅうり、マヨネーズ、塩、胡椒を混ぜて完成">{{ old('procedure') ? old('procedure') : $recipe->procedure }}</textarea>
    </label>
  </div>
  @error('procedure')
  <span class="error_message">調理手順を入力してください</span>
  @enderror

  <div class="recipe_detail">
    <label class="recipe_title" for="">
    調理時間
    <div>
      <input class="time" min="0" type="number" name="time" placeholder="10" value="{{ old('time') ? old('time') : $recipe->time }}">
      <span>分</span>
    </div>
    @error('time')
    <span class="error_message">調理時間を入力してください</span>
    @enderror
    
    </label>
    <select class="category_select" name="category_id">
        <option value="1" {{ old('category_id') == 1 ? 'selected' : ($recipe->category_id == 1 ? 'selected' : '')}}>カテゴリーを選択</option>
        <option value="2" {{ old('category_id') == 2 ? 'selected' : ($recipe->category_id == 2 ? 'selected' : '')}}>お肉</option>
        <option value="3" {{ old('category_id') == 3 ? 'selected' : ($recipe->category_id == 3 ? 'selected' : '')}}>魚介類</option>
        <option value="4" {{ old('category_id') == 4 ? 'selected' : ($recipe->category_id == 4 ? 'selected' : '')}}>野菜</option>
        <option value="5" {{ old('category_id') == 5 ? 'selected' : ($recipe->category_id == 5 ? 'selected' : '')}}>汁物</option>
        <option value="6" {{ old('category_id') == 6 ? 'selected' : ($recipe->category_id == 6 ? 'selected' : '')}}>麺類</option>
        <option value="7" {{ old('category_id') == 7 ? 'selected' : ($recipe->category_id == 7 ? 'selected' : '')}}>ご飯もの</option>
        <option value="8" {{ old('category_id') == 8 ? 'selected' : ($recipe->category_id == 8 ? 'selected' : '')}}>お菓子</option>
        <option value="9" {{ old('category_id') == 9 ? 'selected' : ($recipe->category_id == 9 ? 'selected' : '')}}>その他</option>
    </select>
  </div>
  @error('category_id')
  <span class="error_message">カテゴリーを選択してください</span>
  @enderror
  <img id="preview" src="" alt="プレビュー画像" style="display: none; max-width: 100%; height: auto;">
  <button class="btn" type="submit">変更する</button>
</form>

<script src="{{ asset('js/create.js') }}"></script>

@endsection

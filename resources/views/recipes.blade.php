@extends('layouts.index')
@section('ittle','レシピ一覧')
@section('main')
<div class="container">
<form class="form_search" action="{{ route('recipes.search') }}" method="get">

<div class="query_div">
  <input class="query" value="{{ $request ? $request->input('query') : '' }}" type="text" name="query" placeholder=" 材料で検索">
    <button  class="search_btn">
      <img class="search_img" src="{{ asset('img/search-line-white.svg') }}" alt="">
    </button>
</div>
    
    <div class="category_sort_title">
      <span class="category">カテゴリーを選択</span>
      <span class="sort">並び替え</span>
    </div>
    <div class="category_sort">
    <select class="category" name="category">
        <option value="1" {{ $request ? ($request->input('category') == 1 ? 'selected' : '' ) : ''}}>全て</option>
        <option value="2" {{ $request ? ($request->input('category') == 2 ? 'selected' : '' ) : '' }}>お肉</option>
        <option value="3" {{ $request ? ($request->input('category') == 3 ? 'selected' : '' ) : ''  }}>魚介類</option>
        <option value="4" {{ $request ? ($request->input('category') == 4 ? 'selected' : '' ) : ''   }}>野菜</option>
        <option value="5" {{ $request ? ($request->input('category') == 5 ? 'selected' : '' ) : ''   }}>汁物</option>
        <option value="6" {{ $request ? ($request->input('category') == 6 ? 'selected' : '' ) : ''   }}>麺類</option>
        <option value="7" {{ $request ? ($request->input('category') == 7 ? 'selected' : '' ) : ''   }}>ご飯もの</option>
        <option value="8" {{ $request ? ($request->input('category') == 8 ? 'selected' : '' ) : ''   }}>お菓子</option>
        <option value="9" {{ $request ? ($request->input('category') == 9 ? 'selected' : '' ) : ''   }}>その他</option>
    </select>
    
    <select class="sort" name="sort">
        <option value="created_at" {{ $request ? ($request->input('sort') == "created_at" ? 'selected' : '' ) : ''   }}>新しい順</option>
        <option value="rakudo_avg" {{ $request ? ($request->input('sort') == "rakudo_avg" ? 'selected' : '' ) : ''   }}>ラク度順</option>
        <option value="time" {{ $request ? ($request->input('sort') == "time" ? 'selected' : '' ) : ''   }}>調理時間が短い順</option>
    </select>
    </div>
    
    <button class="btn" type="submit">検索する</button>
</form>


<div class="recipes_container">
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
    <div class="pagination">{{ $recipes->appends(request()->query())->links() }}</div>
  </div>
</div>


</div>

@endsection

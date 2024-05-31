<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ECWWD7YCS6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ECWWD7YCS6');
</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/app.css?ver1.0') }}">
  <title>@yield('title','Racipe')</title>
  <link rel="icon" href="{{ asset('img/favicon.ico') }}">
  <meta name="description" content="ラクにつくれるレシピシェアをできるサービス。レシピを「ラクにつくれる順」で検索可能、「調理時間が短い順」でも検索可能。シンプルで使いやすい。">
  <meta name="theme-color" content="#FF3F25" >
  <meta name="apple-mobile-web-app-status-bar-style" content="#FF3F25">
</head>
<body id="body">
  <header>
    <!-- <h1>Racipe</h1> -->
<img class="header_logo" src="{{ asset('img/Group 1header_logo.svg') }}" alt="">

<!-- ハンバーガーメニュー -->
    <div class="hamburger">
      <img id="open" src="{{ asset('img/menu-3-line.svg') }}" alt="">
    </div>

    <div class="overlay">
      <div class="hamburger">
        <div>
          <img class="close" id="close" src="{{ asset('img/close-line.svg') }}" alt="">
        </div>
      
      </div>
    
      <ul>
        <li><a href="{{ route('recipes') }}">レシピを見る</a></li>
        @guest
          <li><a href="{{ route('register') }}">新規登録</a></li>
          <li><a href="{{ route('login') }}">ログイン</a></li>
        @endguest

        @auth
        <li><a href="{{ route('mypage') }}">マイページ</a></li>
        @endauth
        
        <li><a href="{{ route('create') }}">レシピを投稿</a></li>

        <li><a href="{{ route('faq') }}">よくある質問</a></li>

        <li><a href="{{ route('contact') }}">お問い合わせ</a></li>
      </ul>
    </div>
    
<!-- ハンバーガーメニューここまで -->

  </header>
  <main>
    @yield('main')
  </main>

  <nav class="sp_nav">
    <ul>
      <li>

        <a href="{{ route('index') }}"><img class="icon" src="{{ asset('img/home-line.svg') }}" alt="">ホーム</a>
      </li>
      <li>
        <a href="{{ route('recipes') }}"><img class="icon" src="{{ asset('img/search-line.svg') }}" alt="">探す</a>
      </li>
      <li>
        <a href="{{ route('create') }}"><img class="icon" src="{{ asset('img/add-line.svg') }}" @guest onClick="login_check()" @endguest  alt="">投稿</a>
      </li>
      <li>
        <a href="{{ route('favorites') }}"><img class="icon" src="{{ asset('img/bookmark-line.svg') }}" @guest onClick="login_check()" @endguest alt="">お気に入り</a>
      </li>
      <li>
        <a href="{{ route('mypage') }}"><img class="icon" src="{{ asset('img/user-line.svg') }}" @guest onClick="login_check()" @endguest alt="">マイページ</a>
      </li>
    </ul>
    
  </nav>

  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>

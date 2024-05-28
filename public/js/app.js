// import './bootstrap';
'use strict';
function login_check(){
  alert('ログインして下さい')

}
{
  const open = document.getElementById("open");
  const close = document.getElementById("close");
  const body = document.getElementById("body");
  const overlay = document.querySelector(".overlay");
  open.addEventListener("click",()=>{
    overlay.classList.toggle("active");
    open.classList.toggle("inactive");
    body.classList.toggle("inactive");
  });

  close.addEventListener("click",()=>{
    overlay.classList.toggle("active");
    open.classList.toggle("inactive");
    body.classList.toggle("inactive");
  });
  

  // カルーセル
// スライダーの要素を取得
const slide = document.getElementById('slider');
const prev = document.getElementById('prev');
const next = document.getElementById('next');


// 現在のスライドのインデックスを保持
let currentSlideIndex = 0;

// スライドの要素数を取得
let totalSlides = slide.children.length;

// クリックイベントを設定
next.addEventListener('click', () => changeSlide(1));
prev.addEventListener('click', () => changeSlide(-1));

// スライドを変更する関数
function changeSlide(direction) {
  // 現在のスライドのクラスを削除
  slide.children[currentSlideIndex].classList.remove('active');

  // インデックスを更新
  currentSlideIndex = (currentSlideIndex + direction + totalSlides) % totalSlides;

  // 新しいスライドのクラスを追加
  slide.children[currentSlideIndex].classList.add('active');
}

// 初期スライドを設定
slide.children[currentSlideIndex].classList.add('active');

  // カルーセルここまで

        // JavaScriptのコードをここに追加します
        document.getElementById('fileInput').addEventListener('change', function() {
            document.getElementById('message').style.display = 'block';
        });
}


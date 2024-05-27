'use strict';
{
  document.getElementById('cooking_img1').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview1');
            preview.src = e.target.result;
            preview.style.display = 'block';
            document.getElementById('unselected1').style.display = 'none';
            document.getElementById('unselected_num1').style.display = 'none'; // メッセージを非表示
        };
        reader.readAsDataURL(file);
    } else {
        document.getElementById('preview').style.display = 'none';
    }
});  

document.getElementById('cooking_img2').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview2');
            preview.src = e.target.result;
            preview.style.display = 'block';
            document.getElementById('unselected2').style.display = 'none';
            document.getElementById('unselected_num2').style.display = 'none'; // メッセージを非表示
        };
        reader.readAsDataURL(file);
    }
});  

document.getElementById('cooking_img3').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview3');
            preview.src = e.target.result;
            preview.style.display = 'block';
            document.getElementById('unselected3').style.display = 'none';
            document.getElementById('unselected_num3').style.display = 'none'; // メッセージを非表示
        };
        reader.readAsDataURL(file);
    }
});  

document.getElementById('cooking_img4').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview4');
            preview.src = e.target.result;
            preview.style.display = 'block';
            document.getElementById('unselected4').style.display = 'none';
            document.getElementById('unselected_num4').style.display = 'none'; // メッセージを非表示
        };
        reader.readAsDataURL(file);
    }
});  

}

function post(){
    windows.alert('投稿しました');
}
'use strict';
{
  document.getElementById('icon_img').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview_icon');
            preview.src = e.target.result;
            preview.style.display = 'block';
            if(document.getElementById('before_icon')){
                document.getElementById('before_icon').style.display = 'none';
            }

            if(document.getElementById('unselected_icon')){
                document.getElementById('unselected_icon').style.display = 'none';
            }

        };
        reader.readAsDataURL(file);
    } else {
        document.getElementById('preview').style.display = 'none';
    }
});
}

function delete_check(){
    if(window.confirm('本当に削除しますか？')){
        return true;
    }else{
        return false;
    }

}


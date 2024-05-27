'use strict';

function logout_check(){
    if(window.confirm('ログアウトしますか？')){
        return true;
    }else{
        return false;
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Recipe;
use App\Models\recipe_user;

class UserController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'agreement' => 'accepted'
        ]);

        User::create($validated);

        return to_route('login');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return redirect('/login')->with('status', 'メールアドレス、またはパスワードが違います');
    }

    public function logout(Request $request){
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }


    // ユーザーの登録情報変更
    public function update(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:25',
            'email' => 'required|max:255',
            'path' => 'nullable'
        ]);

        if($request->hasFile('image')){
            $path = $request->file('image')->store('public/images');
        }else{
            $path = Auth::user()->path;
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->path = $path;
        $user->save();

        return to_route('mypage');
        }

        public function delete(){
            if(!Auth::user()){
                return to_route('index');
            }
            recipe_user::where('user_id', Auth::user()->id)->delete();
            $recipes = Recipe::where('user_id',Auth::user()->id)->pluck('id')->toArray();
            recipe_user::whereIn('recipe_id',$recipes)->delete();
            Recipe::where('user_id',Auth::user()->id)->delete();
            User::where('id',Auth::user()->id)->delete();
            return to_route('index');
            }
}

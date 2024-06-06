<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\Models\Recipe;
use App\Models\User;
use App\Models\recipe_user;

class TopController extends Controller
{
    //home表示
    public function index(){
        $recipes = Recipe::take(7)->latest()->get();
        return view('index',compact('recipes'));
    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function recipes(){
        $recipes = Recipe::orderBy('created_at','desc')->simplePaginate(10);
        $request = null;
        return view('recipes',compact('recipes','request'));

    }

    public function terms(){
        return view('terms');
    }

    public function privacy_policy(){
        return view('privacy_policy');
    }

    public function faq(){
        return view('faq');
    }

    // レシピ検索
    public function search(Request $request){
        if($request->input('category') == 1){
            //全てのカテゴリー(category_id = 1)
            if($request->input('sort') == 'time'){
                $recipes = Recipe::where('ingredient','LIKE',"%{$request->input('query')}%")->orderBy($request->input('sort'),'asc')->simplePaginate(10);
            }else{
                $recipes = Recipe::where('ingredient','LIKE',"%{$request->input('query')}%")->orderBy($request->input('sort'),'desc')->simplePaginate(10);
            
            }
        }else{
            //全てのカテゴリーでない場合(category_id != 1)
            if($request->input('sort') == 'time'){
                $recipes = Recipe::where('ingredient','LIKE',"%{$request->input('query')}%")->where('category_id',$request->input('category'))->orderBy($request->input('sort'),'asc')->simplePaginate(10);
            }else{
                $recipes = Recipe::where('ingredient','LIKE',"%{$request->input('query')}%")->where('category_id',$request->input('category'))->orderBy($request->input('sort'),'desc')->simplePaginate(10);
            
            }
        }

        
        return view('recipes',compact('recipes','request'));

    }

    public function create(){
        return view('create');
    }

    public function contact(){
        return view('contact');
    }

    public function favorites(){
        $recipe_id = recipe_user::where('user_id',Auth::user()->id)->where('is_favorite',"1")->orderBy('updated_at',"desc")->pluck('recipe_id')->toArray();
        if($recipe_id){
            $recipes = Recipe::whereIn('id',$recipe_id)->orderByRaw('FIELD(id, '.implode(',', $recipe_id).')')->get();
        }else{
            $recipes = null;
        }
        
        return view('favorites',compact('recipes'));
    }

    public function mypage(){
        $username = Auth::user()->name;
        return view('mypage',compact('username'));
    }

    public function profile_edit(){
        $user = Auth::user();
        return view('profile_edit', compact('user'));
    }

    public function recipe($id){
        $recipe = Recipe::findOrFail($id);
        $recipe_user = User::where('id', $recipe->user_id)->first();
        if(Auth::check()){
            $recipe_rakudo = recipe_user::where('user_id',Auth::user()->id)->where('recipe_id',$id)->first();
        }else{
            $recipe_rakudo = null;
        }
        
        return view('recipe',compact('recipe','recipe_user','recipe_rakudo'));
    }

    public function myrecipes(){
        $recipes = Recipe::where('user_id',Auth::user()->id)->get();
        return view('myrecipes',compact('recipes'));
    }

    public function myrecipe_rakudo($id){
        $recipe = Recipe::findOrFail($id);
        return view('myrecipe_rakudo',compact('id','recipe'));
    }

    public function edit(){
        return view('edit');
    }
}

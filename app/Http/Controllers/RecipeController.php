<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use App\Models\recipe_user;

class RecipeController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'image1' => 'required',
            'image2' => 'nullable',
            'image3' => 'nullable',
            'image4' => 'nullable',
            'ingredient' => 'required',
            'procedure' => 'required',
            'time' => 'required',
            'rakudo_avg' => 'nullable',
        ]);


        if($request->hasFile('image1')){
            $cooking_img1 = $request->file('image1')->store('public/images');
        }else{
            $cooking_img1 = null;
        }

        if($request->hasFile('image2')){
            $cooking_img2 = $request->file('image2')->store('public/images');
        }else{
            $cooking_img2 = null;
        }

   
        if($request->hasFile('image3')){
            $cooking_img3 = $request->file('image3')->store('public/images');
        }else{
            $cooking_img3 = null;
        }

       
        if($request->hasFile('image4')){
            $cooking_img4 = $request->file('image4')->store('public/images');
        }else{
            $cooking_img4 = null;
        }
        
        
        $recipe = Recipe::create([
            'user_id' => $validated['user_id'],
            'category_id' => $validated['category_id'],
            'title' => $validated['title'],
            'cooking_img1' => $cooking_img1,
            'cooking_img2' => $cooking_img2,
            'cooking_img3' => $cooking_img3,
            'cooking_img4' => $cooking_img4,
            'ingredient' => $validated['ingredient'],
            'procedure' => $validated['procedure'],
            'time' => $validated['time'],
        ]);
        
        $id = $recipe->id;
        $request->session()->regenerateToken();
        return redirect()->route('myrecipe_rakudo', compact('id'));
    }

    public function edit($id){
        $recipe = Recipe::findOrFail($id);
        return view('edit',compact('recipe'));
    }

    public function edit_store(Request $request,$id){
        $recipe = Recipe::findOrFail($id);
        $validated = $request->validate([
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'image1' => 'nullable',
            'image2' => 'nullable',
            'image3' => 'nullable',
            'image4' => 'nullable',
            'ingredient' => 'required',
            'procedure' => 'required',
            'time' => 'required',
            'rakudo_avg' => 'nullable',
        ]);


        if($request->hasFile('image1')){
            $cooking_img1 = $request->file('image1')->store('public/images');
        }else{
            $cooking_img1 = $recipe->cooking_img1;
        }

        if($request->hasFile('image2')){
            $cooking_img2 = $request->file('image2')->store('public/images');
        }else{
            $cooking_img2 = $recipe->cooking_img2;
        }

   
        if($request->hasFile('image3')){
            $cooking_img3 = $request->file('image3')->store('public/images');
        }else{
            $cooking_img3 = $recipe->cooking_img3;
        }

       
        if($request->hasFile('image4')){
            $cooking_img4 = $request->file('image4')->store('public/images');
        }else{
            $cooking_img4 = $recipe->cooking_img4;
        }
        

        
        $recipe->user_id = $request->user_id;
        $recipe->category_id = $request->category_id;
        $recipe->title = $request->title;
        $recipe->cooking_img1 = $cooking_img1;
        $recipe->cooking_img2 = $cooking_img2;
        $recipe->cooking_img3 = $cooking_img3;
        $recipe->cooking_img4 = $cooking_img4;
        $recipe->ingredient = $request->ingredient;
        $recipe->procedure = $request->procedure;
        $recipe->time = $request->time;
        $recipe->save();
        
        $id = $recipe->id;
        $request->session()->regenerateToken();
        return redirect()->route('myrecipe_rakudo', compact('id'));
    }


    public function evaluate(Request $request){
        $validated = $request->validate([
            'user_id' => 'required',
            'recipe_id' => 'required',
            'is_favorite' => 'nullable',
            'rakudo' => 'nullable',
        ]);
        
        $recipe_rakudo = recipe_user::where('user_id',$request->user_id)->where('recipe_id',$request->recipe_id)->first();

        if(isset($validated['is_favorite'])){
            $is_favorite = $validated['is_favorite'];
        }elseif(isset($recipe_rakudo->is_favorite)){
            $is_favorite = $recipe_rakudo->is_favorite;
        }else{
            $is_favorite = 0;
        }

        // rakudoが押されていない場合（お気に入り登録のみの場合）rakudoに0を代入
        if(empty($validated['rakudo'])){
            $validated['rakudo'] = 0;
        }
        

        
        // 過去のデータがあるか否かで処理を分岐
        if(isset($recipe_rakudo)){
            $recipe_rakudo->rakudo = $validated['rakudo'];
            $recipe_rakudo->is_favorite = $is_favorite;
            $recipe_rakudo->save();
        }else{
            recipe_user::create($validated);
        }


        $recipe = Recipe::findOrFail($request->recipe_id);
        $recipe_user = User::where('id', $recipe->user_id)->first();
        $recipe_rakudo = recipe_user::where('user_id',$request->user_id)->where('recipe_id',$request->recipe_id)->first();

        // レシピのrakudo_avgを更新
        $racipe_avg = recipe_user::where('recipe_id',$request->recipe_id)->pluck('rakudo');
        $racipe_avg = $racipe_avg->avg();
        $recipe->rakudo_avg = $racipe_avg;
        $recipe->save();

        return view('recipe',compact('recipe','recipe_user','recipe_rakudo'));
    }

    public function delete($recipe_id){
        recipe_user::where('recipe_id',$recipe_id)->delete();
        Recipe::where('id', $recipe_id)->delete();
        return to_route('myrecipes');
    }

    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'cooking_img1',
        'cooking_img2',
        'cooking_img3',
        'cooking_img4',
        'ingredient',
        'procedure',
        'time',
    ];
}

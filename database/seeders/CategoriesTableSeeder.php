<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
        'id' => 1,
        'category_name' => '全て',
       ]);
   
        Category::create([
        'id' => 2,
        'category_name' => 'お肉',
       ]);

        Category::create([
        'id' => 3,
        'category_name' => '魚介類',
       ]);

        Category::create([
        'id' => 4,
        'category_name' => '野菜',
       ]);

       Category::create([
        'id' => 5,
        'category_name' => '汁物',
       ]);

       Category::create([
        'id' => 6,
        'category_name' => '麺類',
       ]);

       Category::create([
        'id' => 7,
        'category_name' => 'ご飯もの',
       ]);

       Category::create([
        'id' => 8,
        'category_name' => 'お菓子',
       ]);

       Category::create([
        'id' => 9,
        'category_name' => 'その他',
       ]);
    }
}

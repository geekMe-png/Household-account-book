<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['category_name' => '食費']);
        Category::create(['category_name' => '日用品']);
        Category::create(['category_name' => '交通費']);
        Category::create(['category_name' => '水道・光熱費']);
        Category::create(['category_name' => '通信費']);
        Category::create(['category_name' => '医療費']);
        Category::create(['category_name' => '教育費']);
        Category::create(['category_name' => '住居費']);
        Category::create(['category_name' => '交際費']);
        Category::create(['category_name' => '美容']);
        Category::create(['category_name' => '衣服']);
    }
}

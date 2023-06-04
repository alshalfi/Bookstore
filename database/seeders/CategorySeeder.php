<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' =>'Leading business']);
        Category::create(['name' =>'Freelance']);
        Category::create(['name' =>'Sales and marketing']);
        Category::create(['name' =>'Programming']);
        Category::create(['name' =>'Design']);
    }
}

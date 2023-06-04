<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        Author::create(['name' => 'ahmed ali']);
        Author::create(['name' => 'helal ali']);
        Author::create(['name' => 'momo ali']);
        Author::create(['name' => 'ahmed momo']);
        Author::create(['name' => 'ahmed helal']);
        Author::create(['name' => 'ali momo']);

    }
}

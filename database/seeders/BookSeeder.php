<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Query\Expression;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book1 = Book::create([
            'category_id' => Category::where('name','Leading business')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the first book',
            'isbn' => '100000000000',
            'number_of_pages' => '288',
            'number_of_copies'=>'300',
            'description'=> 'the description of the book',
            'price' => '17', 
            'cover_image' => 'images/covers/1.png'
        ]);
        $book1->authors()->attach(Author::where('name','ahmed ali')->first());
 
           $book2 = Book::create([
            'category_id' => Category::where('name','Freelance')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the second book',
            'isbn' => '100000000001',
            'number_of_pages' => '288',
            'number_of_copies'=>'300',
            'description'=> 'the description of with out the book',
            'price' => '20', 
            'cover_image' => 'images/covers/2.png'
        ]);
        $book2->authors()->attach(Author::where('name','helal ali')->first());

        $book3 = Book::create([
            'category_id' => Category::where('name','Sales and marketing')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the thired book',
            'isbn' => '100000000002',
            'number_of_copies'=>'300',
            'number_of_pages' => '288', 
            'description'=> 'the description of the book is ready',
            'price' => '77', 
            'cover_image' => 'images/covers/3.png'
        ]);
        $book3->authors()->attach(Author::where('name','momo ali')->first());

        $book4 = Book::create([
            'category_id' => Category::where('name','Programming')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the fourth book',
            'isbn' => '100000000003',
            'number_of_copies'=>'300',
            'number_of_pages' => '288', 
            'description'=> 'the description of the book, if you want to read',
            'price' => '27', 
            'cover_image' => 'images/covers/4.png'
        ]);
        $book4->authors()->attach(Author::where('name','ahmed momo')->first());

        $book5 = Book::create([
            'category_id' => Category::where('name','Design')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the fifth book',
            'isbn' => '100000000004',
            'number_of_copies'=>'300',
            'number_of_pages' => '288',           
            'description'=> 'the description of the book to decide if you will buy it',
            'price' => '15',  
            'cover_image' => 'images/covers/5.png'
        ]);
        $book5->authors()->attach(Author::where('name','ahmed helal')->first());

        $book6 = Book::create([
            'category_id' => Category::where('name','Design')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the fifth book',
            'isbn' => '100000000005',
            'number_of_copies'=>'300',
            'number_of_pages' => '288',           
            'description'=> 'the description of the book to decide if you will buy it',
            'price' => '33',  
            'cover_image' => 'images/covers/6.png'
        ]);
        $book6->authors()->attach(Author::where('name','ahmed helal')->first());

        $book7 = Book::create([
            'category_id' => Category::where('name','Freelance')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the fifth book',
            'isbn' => '100000000006',
            'number_of_copies'=>'300',
            'number_of_pages' => '288',           
            'description'=> 'the description of the book to decide if you will buy it while i am studing ',
            'price' => '30',  
            'cover_image' => 'images/covers/7.png'
        ]);
        $book7->authors()->attach(Author::where('name','momo ali')->first());

        
        $book8 = Book::create([
            'category_id' => Category::where('name','Freelance')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the fifth book',
            'isbn' => '100000000007',
            'number_of_copies'=>'300',
            'number_of_pages' => '288',           
            'description'=> 'the description of the book to decide if you will buy it as long as we can',
            'price' => '31',  
            'cover_image' => 'images/covers/8.png'
        ]);
        $book8->authors()->attach(Author::where('name','ahmed momo')->first());
        
        $book9 = Book::create([
            'category_id' => Category::where('name','Freelance')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the fifth book',
            'isbn' => '100000000008',
            'number_of_copies'=>'300',
            'number_of_pages' => '288',           
            'description'=> 'the description of the book to decide if you will buy it',
            'price' => '27',  
            'cover_image' => 'images/covers/9.png'
        ]);
        $book9->authors()->attach(Author::where('name','helal ali')->first());
        
        $book10 = Book::create([
            'category_id' => Category::where('name','Freelance')->first()->id,
            'publisher_id' => Publisher::where('name','Abdulwahid publisher')->first()->id,
            'title' => 'name of the fifth book',
            'isbn' => '100000000009',
            'number_of_copies'=>'300',
            'number_of_pages' => '288',           
            'description'=> 'the description of the book to decide if you will buy it as momo ali',
            'price' => '21',  
            'cover_image' => 'images/covers/10.png'
        ]);
        $book10->authors()->attach(Author::where('name','momo ali')->first());












    }
}

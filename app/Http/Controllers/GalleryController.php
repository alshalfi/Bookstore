<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class GalleryController extends Controller
{
     public function index()
     {
        $books = book::paginate(12);//paginate will bring all the books from dataabase as 12 books 
        $title = 'Home page';// على اساس انه معرض الكتب
        return view('gallery', compact('books','title'));
     }

     public function search(Request $request)
     {
         $books = book::where('title', 'like', "%{$request->term}%")->paginate(12);
         $title = 'research results..'.$request->term;
         return view('gallery', compact('books','title'));


     }



}

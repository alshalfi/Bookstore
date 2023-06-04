<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

   /*  public function addToCart(Request $request)
    {
        $book = Book::find($request->id);

        if(auth()->user()->booksInCart->contains($book)) {
            $newQuantity = $request->quantity + auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;
            if($newQuantity > $book->number_of_copies) {
                session()->flash('warning_message',  'The book has not been added, you have exceeded
                    the number of copies we have, the maximum number you can reserve from this book
                     is' . ($book->number_of_copies - auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies) . 'book');
                return redirect()->back();
            } else {
                auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies'=> $newQuantity]);
            }

        } else {
            auth()->user()->booksInCart()->attach($request->id, ['number_of_copies'=> $request->quantity]);
        }

        $num_of_product = auth()->user()->booksInCart()->count();

        return response()->json(['num_of_product' => $num_of_product]);
    }
 */
public function addToCart(Request $request)
{
    $book = Book::find($request->id);

    if (auth()->check()) {
        $user = auth()->user();

        if ($user->booksInCart->contains($book)) {
            $cartItem = $user->booksInCart()->where('book_id', $book->id)->first();
            $newQuantity = $request->quantity + $cartItem->pivot->number_of_copies;

            if ($newQuantity > $book->number_of_copies) {
                session()->flash('warning_message', 'The book has not been added. You have exceeded the maximum number of copies available. The maximum you can reserve from this book is ' . ($book->number_of_copies - $cartItem->pivot->number_of_copies) . ' book(s).');
                return redirect()->back();
            } else {
                $user->booksInCart()->updateExistingPivot($book->id, ['number_of_copies' => $newQuantity]);
            }
        } else {
            $user->booksInCart()->attach($book, ['number_of_copies' => $request->quantity]);
        }

        $num_of_product = $user->booksInCart()->count();

        return response()->json(['num_of_product' => $num_of_product]);
    }

    // Handle case when user is not authenticated
    // You can customize this part according to your application's logic
    return redirect()->back();
}


    public function viewCart()
    {
        $items = auth()->user()->booksInCart;
        return view('cart', compact('items'));
    }

    public function removeOne(Book $book) {
        $oldQuantity = auth()->user()->booksInCart()->where('book_id', $book->id)->first()->pivot->number_of_copies;

        if($oldQuantity > 1) {
            auth()->user()->booksInCart()->updateExistingPivot($book->id, ['number_of_copies'=> $oldQuantity - 1]);
        } else {
           auth()->user()->booksInCart()->detach($book->id);
        }

        return redirect()->back();
    }

    public function removeAll(Book $book) {
        auth()->user()->booksInCart()->detach($book->id);

        return redirect()->back();
    }
}

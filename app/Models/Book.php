<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo('App\Models\category'); // it is read like the book belongs to category    
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
    
    public function publisher()
    {
        return $this->belongsTo('App\Models\publisher'); // this book belongs to one publisher
    }

    public function authors()
    {
        return $this->belongsToMany('App\Models\Author', 'book_author');// books are belong to many authos
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function rate()
    {
        return $this->ratings->isNotEmpty() ? $this->ratings()->sum('value') / $this->ratings()->count() : 0;
    }


}

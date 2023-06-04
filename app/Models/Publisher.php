<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    public function books()
    {

        return $this->hasMany('App\Models\Book'); // it means this publisher has many book

    }

}
 
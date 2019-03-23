<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['book_id', 'title', 'sub_title', 'slug', 'body'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

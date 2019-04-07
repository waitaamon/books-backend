<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['book_id', 'is_live', 'order', 'title', 'sub_title', 'slug', 'body'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

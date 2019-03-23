<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['title', 'description'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}

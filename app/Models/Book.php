<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'author', 'publisher', 'language_id', 'is_live'];

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre');
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'book_topic');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }
}

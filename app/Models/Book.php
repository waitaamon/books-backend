<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Book extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = ['user_id', 'title', 'slug', 'author', 'publisher','description', 'featured', 'language_id', 'is_live'];

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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('banner')->width(1200)->height(800)->sharpen(10);

        $this->addMediaConversion('post')->width(700)->height(467)->sharpen(10);

        $this->addMediaConversion('thumbnail')->width(368)->height(232)->sharpen(10);
    }
}

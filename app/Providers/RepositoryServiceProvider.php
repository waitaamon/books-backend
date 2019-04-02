<?php

namespace App\Providers;

use App\Repositories\Contracts\BookRepository;
use App\Repositories\Contracts\ChapterRepository;
use App\Repositories\Contracts\GalleryRepository;
use App\Repositories\Contracts\GenreRepository;
use App\Repositories\Contracts\LanguageRepository;
use App\Repositories\Contracts\TopicRepository;
use App\Repositories\Contracts\UserRepository;
use App\Repositories\Eloquent\EloquentBookRepository;
use App\Repositories\Eloquent\EloquentChapterRepository;
use App\Repositories\Eloquent\EloquentGalleryRepository;
use App\Repositories\Eloquent\EloquentGenreRepository;
use App\Repositories\Eloquent\EloquentLanguageRepository;
use App\Repositories\Eloquent\EloquentTopicRepository;
use App\Repositories\Eloquent\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
        $this->app->bind(LanguageRepository::class, EloquentLanguageRepository::class);
        $this->app->bind(GenreRepository::class, EloquentGenreRepository::class);
        $this->app->bind(TopicRepository::class, EloquentTopicRepository::class);
        $this->app->bind(BookRepository::class, EloquentBookRepository::class);
        $this->app->bind(ChapterRepository::class, EloquentChapterRepository::class);
        $this->app->bind(GalleryRepository::class, EloquentGalleryRepository::class);
    }
}

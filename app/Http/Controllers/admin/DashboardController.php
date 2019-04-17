<?php

namespace App\Http\Controllers\admin;

use App\Repositories\Contracts\BookRepository;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\UserRepository;

class DashboardController extends Controller
{
    /**
     * @var BookRepository
     */
    protected $books;
    protected $users;

    /**
     * DashboardController constructor.
     * @param BookRepository $books
     * @param UserRepository $users
     */
    public function __construct(BookRepository $books, UserRepository $users) {

        $this->books = $books;
        $this->users = $users;
    }

    /**
     *
     */
    public function prerequisites() {
        $books_count = $this->books->all();

        $published_books = $this->books->findWhere('is_live', true);

        $unpublished_books = $this->books->findWhere('is_live', false);

        $users = $this->users->all();

        return response()->json([
            'books' => $books_count->count(),
            'published_books' => $published_books->count(),
            'unpublished_books' => $unpublished_books->count(),
            'users' => $users->count(),
        ], 200);
    }
}

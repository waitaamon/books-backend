<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Book;
use App\Repositories\Contracts\BookRepository;
use App\Repositories\RepositoryAbstract;

class EloquentBookRepository extends RepositoryAbstract implements BookRepository
{

    public function entity() {

        return Book::class;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Genre;
use App\Repositories\Contracts\GenreRepository;
use App\Repositories\RepositoryAbstract;

class EloquentGenreRepository extends RepositoryAbstract implements GenreRepository
{

    public function entity() {

        return Genre::class;
    }
}
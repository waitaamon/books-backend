<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Chapter;
use App\Repositories\Contracts\ChapterRepository;
use App\Repositories\RepositoryAbstract;

class EloquentChapterRepository extends RepositoryAbstract implements ChapterRepository
{

    public function entity() {

        return Chapter::class;
    }
}
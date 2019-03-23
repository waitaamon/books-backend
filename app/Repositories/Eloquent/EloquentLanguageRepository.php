<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Language;
use App\Repositories\Contracts\LanguageRepository;
use App\Repositories\RepositoryAbstract;

class EloquentLanguageRepository extends RepositoryAbstract implements LanguageRepository
{

    public function entity() {

        return Language::class;
    }
}
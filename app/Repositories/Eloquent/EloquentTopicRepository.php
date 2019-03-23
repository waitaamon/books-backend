<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Topic;
use App\Repositories\Contracts\TopicRepository;
use App\Repositories\RepositoryAbstract;

class EloquentTopicRepository extends RepositoryAbstract implements TopicRepository
{

    public function entity() {

        return Topic::class;
    }
}
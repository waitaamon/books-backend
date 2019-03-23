<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 6:16 PM
 */

namespace App\Repositories\Eloquent\Criteria;


use App\Repositories\Criteria\CriterionInterface;

class IsLive implements CriterionInterface
{

    public function apply($entity)
    {
        return $entity->live();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 6:27 PM
 */

namespace App\Repositories\Eloquent\Criteria;


use App\Repositories\Criteria\CriterionInterface;

class ByUser implements CriterionInterface
{
    protected $userId;

    public function __construct($userId)
    {

    $this->userId = $userId;}

    public function apply($entity)
    {
        return $entity->where('user_id', $this->userId);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 6:01 PM
 */

namespace App\Repositories\Eloquent\Criteria;


use App\Repositories\Criteria\CriterionInterface;

class OrderBy implements CriterionInterface
{
    protected $column;
    protected $direction;

    /**
     * OrderBy constructor.
     * @param $column
     * @param $direction
     */
    public function __construct($column, $direction)
    {
        $this->column = $column;
        $this->direction = $direction;
    }


    public function apply($entity)
    {
        return $entity->orderBy($this->column, $this->direction );
    }
}
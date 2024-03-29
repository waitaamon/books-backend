<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 5:07 PM
 */

namespace App\Repositories\Contracts;


interface RepositoryInterface
{
    public function all();

    public function count();

    public function find($id);

    public function findWhere($column, $value);

    public function findWhereFirst($column, $value);

    public function paginate($perPage = 10);

    public function findWherePaginate($column, $value, $perPage = 10);

    public function create(array  $properties);

    public function createWithRelationship(int $modelId, string $method, array $properties);

    public function updateWithRelationship(int $modelId, string $method, array $properties);

    public function sync(int $modelId, string $method, array $properties);

    public function update($id, array  $properties);

    public function delete($id);

}
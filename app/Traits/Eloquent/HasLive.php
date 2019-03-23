<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 6:18 PM
 */

namespace App\Traits\Eloquent;


use Illuminate\Database\Eloquent\Builder;

trait HasLive
{
    public function scopeLive(Builder $builder) {

        return $builder->where('live', true);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:59 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Gallery;
use App\Repositories\Contracts\GalleryRepository;
use App\Repositories\RepositoryAbstract;

class EloquentGalleryRepository extends RepositoryAbstract implements GalleryRepository
{

    public function entity() {

        return Gallery::class;
    }
}
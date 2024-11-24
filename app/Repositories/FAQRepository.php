<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class FAQRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "App\\Models\\FAQ";
    }

    public function getAll(){
        return $this->orderBy('order')->get();
    }

}
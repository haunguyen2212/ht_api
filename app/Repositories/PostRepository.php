<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class PostRepository extends BaseRepository {

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return "App\\Models\\Post";
    }

    public function getFeaturedPost($limit = 0){
        $query = $this->with(['categories', 'tags'])
            ->join('featured_posts', function($join){
                $join->on('featured_posts.post_id', 'posts.id')
                    ->whereNull('featured_posts.deleted_at');
        });

        if($limit){
            $query->limit($limit);
        }

        return $query->get();
    }

    public function getSinglePost($slug){
        return $this->with('tags')->where('slug', $slug)->first();
    }
}
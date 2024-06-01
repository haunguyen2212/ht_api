<?php

namespace App\Repositories;

use Carbon\Carbon;
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
        $now = Carbon::now()->format(config('constants.DATE_TIME_FORMAT'));
        $query = $this->with(['categories', 'tags'])
            ->join('featured_posts', function($join){
                $join->on('featured_posts.post_id', 'posts.id')
                    ->whereNull('featured_posts.deleted_at');
        })
        ->where('publish_status', 1)
        ->where('publish_date_from', '<=', $now)
        ->where(function($q) use ($now){
            $q->where('publish_date_to', '>=', $now)
                ->orWhereNull('publish_date_to');
        })
        ->orderBy('featured_posts.order');

        if($limit){
            $query->limit($limit);
        }

        return $query->get();
    }

    public function getSinglePost($slug){
        $now = Carbon::now()->format(config('constants.DATE_TIME_FORMAT'));
        return $this->with(['tags', 'author'])->where('slug', $slug)
            ->where('publish_status', 1)
            ->where('publish_date_from', '<=', $now)
            ->where(function($q) use ($now){
                $q->where('publish_date_to', '>=', $now)
                    ->orWhereNull('publish_date_to');
            })
            ->first();
    }
}
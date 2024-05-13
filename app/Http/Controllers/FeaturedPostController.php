<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FeaturedPostController extends Controller
{
    public function index(){
        $featured_posts = Post::with('tags')->join('featured_posts', function($join){
             $join->on('featured_posts.post_id', 'posts.id')
                 ->whereNull('featured_posts.deleted_at');
        })->get();
         return response()->json(['data' => $featured_posts, 'message' => 'Success']);
     }
}

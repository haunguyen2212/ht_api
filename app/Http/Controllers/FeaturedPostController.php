<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class FeaturedPostController extends Controller
{
    protected PostRepository $post;

    public function __construct(
        PostRepository $postRepository
    )
    {
        $this->post = $postRepository;
    }

    public function index(){
        $featured_posts = $this->post->getFeaturedPost(3);
        return response()->json(['data' => $featured_posts, 'message' => 'Success']);
    }

}

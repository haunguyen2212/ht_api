<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected PostRepository $post;

    public function __construct(
        PostRepository $postRepository
    )
    {
        $this->post = $postRepository;
    }

    public function show($slug){
        $post = $this->post->getSinglePost($slug);
        return response()->json(['data' => $post, 'message' => 'Success']);
    }

    public function relatedPost($id){
        $relatedPosts = $this->post->getRelatedPost($id, 2);
        return response()->json(['data' => $relatedPosts, 'message' => 'Success']);
    }
}

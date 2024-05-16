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

    public function show($id){
        $post = $this->post->find($id);
        return response()->json(['data' => $post, 'message' => 'Success']);
    }
}

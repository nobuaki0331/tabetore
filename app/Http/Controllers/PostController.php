<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index() {
        $postItem = Post::all();

        return $postItem;

    }

    public function store(PostRequest $request) {
        $post = new Post;
        $post->user_id = $request->user_id;
        $post->content = $request->content;
        $post->title = $request->title;
        $post->save();

        $posts = Post::all();
        return $posts;
    }
}

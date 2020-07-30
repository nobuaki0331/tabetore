<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostInput;

class PostController extends Controller
{
    public function index() {
        $postItem = Post::all();

        return $postItem;

    }

    public function store(PostInput $request) {
        $post = new Post;
        $post->user_id = $request->user_id;
        $post->content = $request->content;
        $post->title = $request->title;
        $post->save();
    }

    public function apiIndex(Request $request) {
        $_user_id = $request->user_id;
        $_title = $request->title;
        $_content = $request->content;

        $query = Post::query();

        if (!empty($_user_id)) {
            $query->where('user_id',$_user_id);
        }

        if (!empty($_title)) {
            $query->where('title','like','%'.$_title.'%');
        }

        if (!empty($_content)) {
            $query->where('content', 'like', '%'.$_content.'%');
        }

        $_post_items = $query->get();
        return $_post_items;
    }
}

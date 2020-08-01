<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdated;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index() {
        return view('top');
    }

    public function update(UserUpdated $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
    }

    public function apiIndex($id) {
        $auth_user = User::find($id)->posts()->get();

        return $auth_user;
    }

    public function apiDestroy($postId) {
        Post::find($postId)->delete();
    }
}

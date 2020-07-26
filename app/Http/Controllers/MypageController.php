<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index() {
        return view('top');
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->id = $request->id;
        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();
    }

    public function apiIndex($id) {
        $auth_user = User::find($id)->posts()->get();

        return $auth_user;
    }
}

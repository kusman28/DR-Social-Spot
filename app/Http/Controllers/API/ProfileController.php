<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;

class ProfileController extends Controller
{
    public function profile() {
        return auth('web')->user();
    }

    public function status() {
        $user = auth('web')->user();

        $status = Post::where('user_id', $user->id)->latest()->get();

        return $status;
    }

    function update(Request $request) {

        $user = auth('web')->user();

        $this->validate($request, [
            'firstname' => 'required|string',
            'email' => 'required|email:filter|unique:users,email,'.$user->id,
        ]);

        $user->update($request->all());

    }
}

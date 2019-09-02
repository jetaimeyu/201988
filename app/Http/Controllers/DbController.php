<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DbController extends Controller
{
    //
    public function db()
    {
        $post = Post::with('user')->where('views', '>', 0)->offset(1)->limit(10)->get();
        dump($post[7]->user);
//        $user = User::findOrFail(1);
//        dump($user->posts[0]->content);
//        $post = Post::findOrFail(4);
//        dump($post->user->name);
//        $user = User::find(1);
//        dump($user);
//        dump($user->profile->bio);
//        $profile = UserProfile::findOrFail(1);
//        dump($profile);
//        dump($profile->user->name);
    }

}

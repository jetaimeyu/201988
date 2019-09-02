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
        $user = User::find(1);
        dump($user);
        dump($user->profile->bio);
        $profile = UserProfile::findOrFail(1);
        dump($profile);
        dump($profile->user->name);
    }

}

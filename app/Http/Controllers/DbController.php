<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    //
    public function db()
    {
        $user = User::findOrFail(9);
        dump($user->delete());
    }

}

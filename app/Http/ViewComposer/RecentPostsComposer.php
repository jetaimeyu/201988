<?php
/**
 * Created by PhpStorm.
 * User: yuyuyu
 * Date: 2019/8/13 0013
 * Time: 上午 10:14
 */

namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;

class RecentPostsComposer
{

    private $posts;
    public  function __construct(){
        $this->posts = "2222";
    }

    public function compose(View $view){
        $view->with('posts', $this->posts);
    }

}

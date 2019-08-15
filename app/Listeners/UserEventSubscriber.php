<?php
/**
 * Created by PhpStorm.
 * User: yuyuyu
 * Date: 2019/8/15 0015
 * Time: 下午 5:43
 */

namespace App\Listeners;


use App\Events\UserDeleted;
use App\Events\UserDeleting;
use Illuminate\Support\Facades\Log;

class UserEventSubscriber
{


    /**
     * 处理用户删除前事件
     * @param $event
     */
    public function onUserDeleting($event)
    {
        Log::info('用户即将删除[' . $event->user->id . ']:' . $event->user->name);

    }

    /**
     * 处理用户删除后事件
     * @param $event
     */
    public function onUserDeleted($event)
    {
        Log::info('用户已经删除[' . $event->user->id . ']:'  . $event->user->name);

    }

    /**
     * 为订阅者注册监听器
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            UserDeleted::class,
            UserEventSubscriber::class . '@onUserDeleted'
        );

        $events->listen(
            UserDeleting::class,
            UserEventSubscriber::class . '@onUserDeleting'
        );
    }

}

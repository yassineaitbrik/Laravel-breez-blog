<?php

namespace App\Listeners;

use App\Events\BlogCreated;
use App\Models\User;
use App\Notifications\NewBlog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendBlogCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(BlogCreated $event): void
    {
        foreach(User::whereNot('id',$event->blog->user_id)->cursor() as $user) {
            $user->notify(new NewBlog($event->blog));
        }
    }
}

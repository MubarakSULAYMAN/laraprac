<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class UserLogActivities
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $activities)
    {
        $this->request = $activities;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;
        $user->last_login_at = date('Y-m-d H:i:s');
        $user->last_login_ip = $this->request->ip();
        $user->save();
    }
}

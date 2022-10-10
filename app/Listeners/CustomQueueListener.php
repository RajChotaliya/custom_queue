<?php

namespace App\Listeners;

use App\Events\CustomQueueEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CustomQueueListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CustomQueueEvent  $event
     * @return void
     */
    public function handle(CustomQueueEvent $event)
    {
        $current_timestamp = Carbon::now()->toDateTimeString();

        $queueInfo = $event->custom_queue;

        $baseClass = class_basename($queueInfo); // get class name
        $saveHistory = DB::table('queues')->insert(
            ['job_name' => $baseClass, 'group' => uniqid(), 'flag' => 0, 'created_at' => $current_timestamp, 'updated_at' => $current_timestamp]
        );
        return $saveHistory;
    }
}

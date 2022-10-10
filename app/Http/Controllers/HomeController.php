<?php

namespace App\Http\Controllers;

use App\Events\CustomQueueEvent;
use Illuminate\Http\Request;
use App\Jobs\TestProcess;
use App\Models\Queue;

class HomeController extends Controller
{

    public function add_queue(){
        TestProcess::dispatch();

        return redirect()->route('home')->with('success', 'Default Job Added Successfully');
    }

    public function add_queue_custom(){

        /* $obj = new Queue();
        $obj->job_name = "TestProcess";
        $obj->group = uniqid(); // 6 digit unique code number
        $obj->flag = 0; // 0 for inactive 1 for active
        $obj->save(); */
        event(new CustomQueueEvent(new TestProcess()));

        return redirect()->route('home')->with('success', 'Custom Job Added Successfully');
    }
}

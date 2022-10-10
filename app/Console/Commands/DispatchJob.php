<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Events\CustomQueueEvent;

class DispatchJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:dispatch {job}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch Job';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $class = '\\App\\Jobs\\' . $this->argument('job');
        dispatch(new $class());
        event(new CustomQueueEvent(new $class())); // add event into db
    }
}

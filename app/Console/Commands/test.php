<?php

namespace App\Console\Commands;

use App\Http\Controllers\DirectController;
use Illuminate\Console\Command;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:swoole';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'swoole测试';

    protected $directController;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(DirectController $directController)
    {
        parent::__construct();
        $this->directController = $directController;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->directController->test();
    }
}

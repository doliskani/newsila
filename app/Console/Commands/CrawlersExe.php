<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CrawlersExe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawlers:exe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'execute crawling websites';

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
     * @return mixed
     */
    public function handle()
    {
        app()->call('App\Http\Controllers\Crawlers\CrawlersExe@executeAllCrawlers');
    }
}

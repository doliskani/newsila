<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SavePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'savePosts:exe';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RSS saved for every source inside database and this command get urls from those RSS and save in database';

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
        app()->call('App\Http\Controllers\RSSReaders\RSSController@SavePostFromRSS');
    }
}

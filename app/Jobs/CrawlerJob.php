<?php

namespace App\Jobs;

use App\Http\Controllers\Crawlers\CrawlersExe;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use phpDocumentor\Reflection\Types\This;

class CrawlerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;
    protected $source;

    /**
     * Create a new job instance.
     * @param $path
     * @param $url
     * @param $prefix
     * @param $source
     * @return void
     */
    public function __construct($source)
    {
        $this->source = $source;
        $source       = strtoupper($source);
        $this->path   = "App\Http\Controllers\Crawlers\\{$source}Controller";
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $cls  = new $this->path($this->source);
        $urls = $cls->getUrls();
        CrawlersExe::checkingUrlsAndSave($urls);
    }
}

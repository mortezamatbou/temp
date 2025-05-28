<?php

namespace App\Listeners;

use App\Events\ArticleUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ArticleListener implements ShouldQueue
{

    public $queue = 'article';
    public $tries = 3;
    public $delay = 10;

    /**
     * Create the event listener.
     */
    public function __construct() {}

    /**
     * Handle the event.
     */
    public function handle(ArticleUpdate $event): void
    {
        sleep(10);
        print($event->article->slug);
    }
}

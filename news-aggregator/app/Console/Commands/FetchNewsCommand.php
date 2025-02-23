<?php

namespace App\Console\Commands;

use App\Http\Controllers\NewsController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchNewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:news {source}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch and store news articles daily';

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
        $source = $this->argument('source');
        $this->info("Fetching news from source: {$source}");
        
        $newsController = app(NewsController::class);
        $newsController->fetch($source);
        $this->info("News fetched successfully for source: {$source}");

    }
}

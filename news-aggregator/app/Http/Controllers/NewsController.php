<?php

namespace App\Http\Controllers;

use App\Services\NewsAggregatorService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    protected $newsAggregatorService;

    public function fetch($sourceKey)
    {
        $newsService = new NewsAggregatorService($sourceKey);
        $news = $newsService->fetchNews();

        return response()->json($news);
    }
}

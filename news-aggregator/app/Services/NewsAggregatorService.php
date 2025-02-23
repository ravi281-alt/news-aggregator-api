<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Source;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Carbon;

class NewsAggregatorService
{
    protected $source;

    public function __construct($sourceKey)
    {
        $this->source = Source::where('id', $sourceKey)->first();
    }

    public function fetchNews()
    {
        if (!$this->source) {
            return ['error' => 'Source not found'];
        }

        switch ($this->source->id) {
            case 1: // NewsAPI
                return $this->fetchNewsApi();
            case 2: // The Guardian
                return $this->fetchTheGuardianNews();
            default:
                return ['error' => 'Invalid source ID'];
        }
    }


    public function fetchNewsApi()
    {
        $categories = Category::select('id', 'name')->get();
        $storedCount = 0;

        foreach ($categories as $category) {
            $params = $this->source->params;
            $params['apiKey']   = $this->source->api_key;
            $params['country']  = 'US';
            $params['pageSize'] = '100';
            $params['category'] = strtolower($category->name);

            $response = Http::get($this->source->url . 'top-headlines', $params);
            $data     = $response->json();

            if ($response->successful() && !empty($data['articles'])) {
                foreach($data['articles'] as $article){

                    $title       = preg_replace('/[^A-Za-z0-9\s\-]/', '', $article['title']);
                    $content     = preg_replace('/[^A-Za-z0-9\s\-]/', '', $article['content']);
                    $author      = $article['author'] ?? null;
                    $image_url   = $article['urlToImage'] ?? null;
                    $publishedAt = isset($article['publishedAt']) ? Carbon::parse($article['publishedAt'])->format('Y-m-d H:i:s') : now();

                    if (!$title || !$content) {
                        continue;
                    }

                    $existing = Article::where('title', $title)->exists();
                    if (!$existing) {
                        Article::create([
                            'category_id'  => $category->id,
                            'title'        => $title,
                            'content'      => $content,
                            'author'       => $author,
                            'image_url'    => $image_url,
                            'source_id'    => $this->source->id,
                            'published_at' => $publishedAt
                        ]);
                        $storedCount++;
                    }
                }
            }
        }

        return ['message' => "$storedCount new articles stored"];
    }


    public function fetchTheGuardianNews()
    {
        $categories = Category::select('id', 'name')->get();
        $storedCount = 0;

        foreach ($categories as $category) {
            $currentPage = 1;
            do {
                $params = [
                    'section'   => strtolower($category->name),
                    'api-key'   => $this->source->api_key,
                    'format'    => 'json',
                    'from-date' => '2025-02-20',
                    'page'      => $currentPage,
                    'page-size' => 10,
                ];

                $response = Http::get('https://content.guardianapis.com/search', $params);
                $data = $response->json();
                
                if ($response->successful() && !empty($data['response']['results'])) {
                    foreach ($data['response']['results'] as $article) {
                        $title       = preg_replace('/[^A-Za-z0-9\s\-]/', '', $article['webTitle']);
                        $content     = preg_replace('/[^A-Za-z0-9\s\-]/', '', $article['webUrl']);
                        $author      = null;
                        $image_url   = $article['apiUrl'] ?? null;
                        $publishedAt = isset($article['webPublicationDate']) ? Carbon::parse($article['webPublicationDate'])->format('Y-m-d H:i:s') : now();

                        if (!$title || !$content) {
                            continue;
                        }
    
                        $existing = Article::where('title', $title)->exists();
                        if (!$existing) {
                            Article::create([
                                'category_id'  => $category->id,
                                'title'        => $title,
                                'content'      => $content,
                                'author'       => $author,
                                'image_url'    => $image_url,
                                'source_id'    => $this->source->id,
                                'published_at' => $publishedAt
                            ]);
                            $storedCount++;
                        }
                    }
                } else {
                    break; 
                }
                $totalPages = $data['response']['pages'] ?? 1;
                $currentPage++;
            } while ($currentPage <= $totalPages);
        }
        return ['message' => "$storedCount new articles stored"];
    }
}

?>
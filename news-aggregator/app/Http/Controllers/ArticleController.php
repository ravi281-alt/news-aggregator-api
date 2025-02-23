<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Source;
use App\Models\Category;
use App\Helpers\ResponseHelper;

class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     summary="Get a list of articles",
     *     tags={"Articles"},
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Search articles by title or content",
     *         required=false,
     *         @OA\Schema(type="string", example="Technology")
     *     ),
     *     @OA\Parameter(
     *         name="date",
     *         in="query",
     *         description="Filter articles by published date (YYYY-MM-DD)",
     *         required=false,
     *         @OA\Schema(type="string", format="date", example="2024-06-30")
     *     ),
     *     @OA\Parameter(
     *         name="category_name",
     *         in="query",
     *         description="Filter articles by category name",
     *         required=false,
     *         @OA\Schema(type="string", example="Business")
     *     ),
     *     @OA\Parameter(
     *         name="source_name",
     *         in="query",
     *         description="Filter articles by source name",
     *         required=false,
     *         @OA\Schema(type="string", example="BBC News")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Articles fetched successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Articles fetched successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="current_page", type="integer", example=1),
     *                 @OA\Property(property="data", type="array",
     *                     @OA\Items(
     *                         @OA\Property(property="category", type="string", example="Technology"),
     *                         @OA\Property(property="source", type="string", example="CNN"),
     *                         @OA\Property(property="author", type="string", example="John Doe"),
     *                         @OA\Property(property="title", type="string", example="AI Innovations"),
     *                         @OA\Property(property="content", type="string", example="Latest trends in AI..."),
     *                         @OA\Property(property="image_url", type="string", example="https://example.com/image.jpg"),
     *                         @OA\Property(property="published_at", type="string", format="date-time", example="2024-06-30 12:00:00")
     *                     )
     *                 ),
     *                 @OA\Property(property="next_page_url", type="string", example=null),
     *                 @OA\Property(property="prev_page_url", type="string", example=null),
     *                 @OA\Property(property="last_page", type="integer", example=5),
     *                 @OA\Property(property="per_page", type="integer", example=100),
     *                 @OA\Property(property="total", type="integer", example=500)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Category or source not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Category not found"),
     *             @OA\Property(property="data", type="array", @OA\Items(type="string"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="An error occurred while fetching articles."),
     *             @OA\Property(property="data", type="array", @OA\Items(type="string"))
     *         )
     *     )
     * )
     */

    public function index(Request $request){
        $query = Article::query();

        if ($request->has('search')) {
            $query->where('title', 'LIKE', "%{$request->search}%")
                ->orWhere('content', 'LIKE', "%{$request->search}%");
        }

        if ($request->has('date')) {
            $query->whereDate('published_at', $request->date);
        }

        if ($request->has('category_name')) {
            $category = Category::where('category_name', $request->category_name)->first();
            if (!$category) {
                return ResponseHelper::formatResponse(false, 'Category not found', [], 404);
            }
            $query->where('category_id', $category->id);
        }

        if ($request->has('source_name')) {
            $source = Source::where('source_name', $request->source_name)->first();
            if (!$source) {
                return ResponseHelper::formatResponse(false, 'Source not found', [], 404);
            }
            $query->where('source_id', $source->id);
        }

        $articles = $query->with(['category', 'source'])
            ->select('id', 'title', 'content', 'author', 'image_url', 'published_at', 'category_id', 'source_id')
            ->paginate(100);

        $articles->getCollection()->transform(function ($article) {
            return [
                'category'     => $article->category->name ?? null,
                'source'       => $article->source->name ?? null,
                'author'       => $article->author,
                'title'        => $article->title,
                'content'      => $article->content,
                'image_url'    => $article->image_url,
                'published_at' => $article->published_at,
            ];
        });

        return ResponseHelper::formatResponse(true, 'Articles fetched successfully', [
            'current_page'  => $articles->currentPage(),
            'data'          => $articles->items(),
            'next_page_url' => $articles->nextPageUrl(),
            'prev_page_url' => $articles->previousPageUrl(),
            'last_page'     => $articles->lastPage(),
            'per_page'      => $articles->perPage(),
            'total'         => $articles->total(),
        ]);
    }


    /**
     * @OA\Get(
     *     path="/api/articles/{id}",
     *     summary="Get a single article by ID",
     *     tags={"Articles"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the article",
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Article fetched successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Article fetched successfully"),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="source", type="string", example="BBC News"),
     *                 @OA\Property(property="aurhor_name", type="string", example="John Doe"),
     *                 @OA\Property(property="category", type="string", example="Technology"),
     *                 @OA\Property(property="title", type="string", example="AI Innovations"),
     *                 @OA\Property(property="content", type="string", example="Latest trends in AI..."),
     *                 @OA\Property(property="image_url", type="string", example="https://example.com/image.jpg"),
     *                 @OA\Property(property="published_at", type="string", format="date-time", example="2024-06-30 12:00:00")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Article not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Article not found"),
     *             @OA\Property(property="data", type="array", @OA\Items(type="string"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Server error",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="An error occurred while fetching the article."),
     *             @OA\Property(property="data", type="array", @OA\Items(type="string"))
     *         )
     *     )
     * )
     */
    public function show($id){
        $article = Article::with(['category', 'source'])->find($id);

        if (!$article) {
            return ResponseHelper::formatResponse(false, 'Article not found', [], 404);
        }

        $formattedArticle = [
            'source'        => $article->source->name ?? null,
            'aurhor_name'   => $article->author,
            'category'      => $article->category->name ?? null,
            'title'         => $article->title,
            'content'       => $article->content,
            'image_url'     => $article->image_url,
            'published_at'  => $article->published_at,
        ];

        return ResponseHelper::formatResponse(true, 'Article fetched successfully', $formattedArticle);
    }

}

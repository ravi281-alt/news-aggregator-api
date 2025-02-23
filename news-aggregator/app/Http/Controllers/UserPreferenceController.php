<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPreference;
use App\Models\Category;
use App\Models\Source;
use App\Helpers\ResponseHelper;

use Illuminate\Http\Request;

class UserPreferenceController extends Controller
{   
    /**
     * @OA\Post(
     *     path="/api/user/preferences",
     *     summary="Store or update user preferences",
     *     tags={"User Preferences"},
     *     security={{ "bearerAuth": {} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="category_name", type="string", example="Technology", description="Category name from categories table"),
     *             @OA\Property(property="source_name", type="string", example="BBC News", description="Source name from sources table"),
     *             @OA\Property(property="author_name", type="string", example="John Doe", description="Preferred author name")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Preferences saved successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Preferences saved successfully."),
     *             @OA\Property(property="data", type="array", @OA\Items(type="string"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Validation failed"),
     *             @OA\Property(property="errors", type="object", example={"category_name": {"The selected category is invalid."}})
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthenticated"),
     *             @OA\Property(property="data", type="array", @OA\Items(type="string"))
     *         )
     *     )
     * )
     */

    public function store(Request $request){
        $request->validate([
            'category_name' => 'nullable|string|exists:categories,name',
            'source_name'   => 'nullable|string|exists:sources,name',
            'author_name'   => 'nullable|string'
        ]);

        $user = Auth::user();

        $category = Category::where('name', $request->category_name)->first();
        $source   = Source::where('name', $request->source_name)->first();

        UserPreference::updateOrCreate(
            ['user_id' => $user ? $user->id : null],
            [
                'category_id' => $category ? $category->id : null,
                'source_id'   => $source ? $source->id : null,
                'author_name' => $request->author_name
            ]
        );
        

        return ResponseHelper::formatResponse(true, 'Preferences saved successfully.');
    }

    /**
     * @OA\Get(
     *     path="/api/user/preferences",
     *     summary="Fetch user preferences",
     *     tags={"User Preferences"},
     *     security={{ "bearerAuth": {} }},
     *     @OA\Response(
     *         response=200,
     *         description="Preferences fetched successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Preferences fetched successfully."),
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="user_id", type="integer", example=2),
     *                     @OA\Property(property="category", type="object",
     *                         @OA\Property(property="id", type="integer", example=3),
     *                         @OA\Property(property="name", type="string", example="Technology")
     *                     ),
     *                     @OA\Property(property="source", type="object",
     *                         @OA\Property(property="id", type="integer", example=4),
     *                         @OA\Property(property="name", type="string", example="BBC News")
     *                     ),
     *                     @OA\Property(property="author_name", type="string", example="John Doe")
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Unauthenticated"),
     *             @OA\Property(property="data", type="array", @OA\Items(type="string"))
     *         )
     *     )
     * )
     */

    public function index()
    {
        $user = Auth::user();

        $preferences = UserPreference::where('user_id', $user->id)
            ->with(['category', 'source'])
            ->get();

        return ResponseHelper::formatResponse(true, 'Preferences fetched successfully.', $preferences);
    }

}

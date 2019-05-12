<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;

class PostApiController extends Controller
{
    /**
     * Store all the data request in the database
     *
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Post::all(), 200);
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;

class UserApiController extends Controller
{
    /**
     * Store all the data request in the database
     *
     * @param CreateArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(User::all(), 200);
    }
}
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * API Routes
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider and all of them will
 * be assigned to the "api" middleware group.
 *
 * @param \Illuminate\Http\Request $request
 *
 * @return \Illuminate\Http\JsonResponse
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    /**
     * Get the authenticated user instance from the request.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|\App\Models\User|null
     */
    return $request->user();
});
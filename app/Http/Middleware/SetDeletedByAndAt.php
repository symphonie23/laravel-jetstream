<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

/**
 * Middleware that sets the deleted_by and deleted_at fields of a deleted resource.
 *
 * This middleware should be applied to any routes that delete resources.
 */
class SetDeletedByAndAt
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated and the request method is DELETE
        if ($user !== null && $request->method() == 'DELETE') {
            $data = $request->all();

            // Set the deleted_by and deleted_at fields of the request data
            $data['deleted_by'] = $user->id;
            $data['deleted_at'] = Carbon::now();

            // Merge the updated data back into the request
            $request->merge($data);
        }

        // Continue processing the request
        return $next($request);
    }
}
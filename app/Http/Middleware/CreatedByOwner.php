<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

/**
 * Middleware that sets the 'created_by' field of a request to the currently authenticated user's ID.
 * 
 * This middleware should be applied to any routes that create new resources. If a 'created_by' field is already
 * present in the request data, it will not be overwritten.
 */
class CreatedByOwner
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request The incoming request
     * @param \Closure $next The next middleware in the chain
     * @return mixed The response from the next middleware in the chain
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user !== null) {
            $data = $request->all();

            // Only set 'created_by' if it hasn't already been set
            if (!isset($data['created_by'])) {
                $data['created_by'] = $user->id;
            }
            
            $request->merge($data);
        }

        return $next($request);
    }
}
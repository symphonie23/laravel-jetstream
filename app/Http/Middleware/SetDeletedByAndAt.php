<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SetDeletedByAndAt
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user !== null && $request->method() == 'DELETE') {
            $data = $request->all();

            $data['deleted_by'] = $user->id;
            $data['deleted_at'] = Carbon::now();

            $request->merge($data);
    }

    return $next($request);
    }
}

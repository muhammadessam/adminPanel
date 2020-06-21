<?php

namespace App\Http\Middleware;

use App\Models\Settings;
use Closure;

class ClosingIfSiteIsClosed
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (!($request->routeIs('admin.*')) && !Settings::all()->first()->is_site_active) {
            abort(503, Settings::all()->first()->localeTrans->message);
        }
        return $next($request);
    }
}

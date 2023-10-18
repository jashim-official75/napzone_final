<?php

namespace App\Http\Middleware;

use App\Models\Subscriber;
use Closure;
use Illuminate\Http\Request;

class GameRestriction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $accessor = $request->session()->get('accessor');
        if (Subscriber::where('token', $accessor)->count() > 0) {
            return $next($request);
        } else {
            return redirect()->route('home');
        }
    }
}

<?php

namespace Modules\ModuleSuperSafety\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class SuperSafety
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && $request->session()->has('supersafety')) {
            return $next($request);
        }

        $request->session()->put('url.intended', URL::full());
        return redirect()->route('loginsupersafety');
    }
}
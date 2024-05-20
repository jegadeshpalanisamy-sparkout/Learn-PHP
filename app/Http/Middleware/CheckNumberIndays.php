<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckNumberIndays
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
        // $num = $request->all();  // Get num from route parameter

        // if ($num > 0 && $num <= 7) {
        //     return redirect('/month/1');  // Redirect if num is between 1 and 7
        // }
            
        if($request->num>2)
        {
            return redirect('/days/1');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkDelete
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


        if (auth()->user()->id == $request->id) {
            session()->flash('Message', "Can't Remove Your Account .. ");
            return redirect(url('Writer'));
        } else {
            return $next($request);
        }
    }
}

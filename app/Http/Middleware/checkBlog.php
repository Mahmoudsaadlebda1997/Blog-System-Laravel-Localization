<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class checkBlog
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

       $url = $request->path();

      $id =  filter_var($url,FILTER_SANITIZE_NUMBER_INT);


       $blog_data = DB :: table('blogs')->find($id);




       if(auth()->user()->id == $blog_data->writer_id){
        return $next($request);
       }else{
        session()->flash('Message', "Can't Show Details .. ");
        return redirect(url('Blog'));
       }


    }
}

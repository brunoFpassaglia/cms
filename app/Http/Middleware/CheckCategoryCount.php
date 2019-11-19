<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class CheckCategoryCount
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
        if(Category::all()->count() === 0){
            session()->flash('warnings', 'You must have at least one category to be able to create a post');
           return redirect()->route('categories.create');
        }
        return $next($request);
    }
}

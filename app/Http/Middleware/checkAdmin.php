<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Gate;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
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
        if (Gate::forUser(session()->get('user'))->allows('view-page-admin')) {
             return $next($request);
        }else{
            abort('403', __('Bạn không có quyền thực hiện thao tác này'));
        }
    }
}

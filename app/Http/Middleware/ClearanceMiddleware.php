<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClearanceMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::user()->hasPermissionTo('Admin')) //If user has this //permission
        {
            return $next($request);
        }

        if ($request->is('admin/product/create'))//If user is creating a post
         {
            if (!Auth::user()->hasPermissionTo('Create Product'))
         {
                abort('401');
            }
         else {
                return $next($request);
            }
        }

        if ($request->is('admin/product/edit/*')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('Edit Product')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/product/delete/*')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('Delete Product')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        //category
        if ($request->is('admin/category'))//If user is creating a post
         {
            if (!Auth::user()->hasPermissionTo('Create Category'))
         {
                abort('401');
            }
         else {
                return $next($request);
            }
        }

        if ($request->is('admin/category/edit/*')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('Edit Category')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        if ($request->is('admin/category/delete/*')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('Delete Category')) {
                abort('401');
            } else {
                return $next($request);
            }
        }
        //ỏder
        if ($request->is('admin/order')) //If user is editing a post
         {
            if (!Auth::user()->hasPermissionTo('Process Order')) {
                abort('401');
            } else {
                return $next($request);
            }
        }

        return $next($request);
    }
}

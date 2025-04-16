<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.getLogin')->with('error', 'Bạn cần đăng nhập trước!');
        }

        // Kiểm tra quyền của user
        if (!in_array(Auth::user()->role, $roles)) {
            return redirect('/trangchu')->with('error', 'Bạn không có quyền truy cập!');
        }

        return $next($request);
    }
}
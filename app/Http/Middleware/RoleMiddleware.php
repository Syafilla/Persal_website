<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $akses)
    {
        // Pastikan user login & hak_akses sesuai
        if (!$request->user() || $request->user()->hak_akses !== $akses) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}

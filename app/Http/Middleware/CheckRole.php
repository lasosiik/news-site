<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Если пользователь не вошел, отправляем на страницу входа
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Получаем название роли текущего пользователя
        $userRole = Auth::user()->role?->name;

        // Если роли пользователя нет в списке разрешенных — выдаем ошибку 403
        if (!in_array($userRole, $roles)) {
            abort(403, 'У вас нет доступа к этой странице.');
        }

        return $next($request);
    }
}
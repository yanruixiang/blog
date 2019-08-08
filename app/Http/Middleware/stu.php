<?php

namespace App\Http\Middleware;

use Closure;

class stu
{
    public function handle($request, Closure $next)
    {
        // 此处前置操作
        echo 'Forever First'."</br>";
        $response = $next($request);
        echo '嗯';
        return $response;
    }
}
<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     //中间件
    public  function handle($request,Closure $next)
    {
        //业务逻辑
        //9点到17点可以访问
        $a = strtotime('9:00:00');//每天9点
        $b = strtotime('17:00:00');//每天17点
        $_now_ = time();//当前时间
        if($_now_ >= $a && $_now_ <= $b){
            //可以通过
        }else{
            //不可以通过
            dd('当前时间段不可以访问');
        }
        return $next($request);
    }
}

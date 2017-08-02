<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use DB;
use Input;
use App\Admin\Admin;
use Auth;

class CheckRbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //需要补充的业务代码
        //获取当前的路由（包含控制器和方法的地址）
        $route = strtolower(Route::currentRouteAction());
        //获取当前的角色
        $ac = Auth::guard('admin')->user()->related_role()->first()->auth_ac;
        //默认全部用户都有后台首页路由的权限
        $ac = strtolower($ac . ',IndexController@index,IndexController@welcome');

        $array = explode('\\', $route);

        if (strpos($ac, end($array) === false)) {
            echo '您没有访问权限';
            die;
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Controllers\Admin;


use App\Admin\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;

class AdminController extends Controller
{
    //展示管理员列表
    public function index($flag = "")
    {
        if ($flag == "isAjax") {
            //查询数据
            //定义排序的字段映射关系
            $map = [
                1 => 'id',
                2 => 'username',
                3 => 'mobile',
                4 => 'email',
                5 => 'role_id',
                6 => 'created_at',
                7 => 'status'
            ];
            //获取排序的字段
            $map_key = Input::get('order.0.column');//等价于获取order[0][column]
            $sortBy  = $map[$map_key];
            $sortRule = Input::get('order.0.dir');//等价于获取order[0][dir]
            //获取搜索参数
            $datemin = Input::get('datemin');
            $datemax = Input::get('datemax');
            $username = Input::get('username');
            //查询数据
            $data = Admin::limit(Input::get("length"))->offset(Input::get('start'))
                ->when($username, function ($query) use ($username) {
                    //$query是指在当前条件子句之前的查询对象
                    if (trim($username)) {
                        $query->where('username', $username);
                    }
                })
                ->when($datemin, function ($query) use ($datemin) {
                    if (trim($datemin)) {
                        $query->whereDate('created_at', '>=', $datemin);
                    }
                })
                ->when($datemax, function ($query) use ($datemax) {
                    if (trim($datemax)) {
                        $query->whereDate('created_at', '<=', $datemax);
                    }
                })->orderBy($sortBy,$sortRule)->get();
            //返回数据
            return [
                'data' => $data,
                //请求的序号，接收后原样返回
                'draw' => Input::get('draw'),
                'recordsTotal' => Admin::count(),
                'recordsFiltered' => Admin::when($username, function ($query) use ($username) {
                    //$query是指在当前条件子句之前的查询对象
                    if (trim($username)) {
                        $query->where('username', $username);
                    }
                })
                    ->when($datemin, function ($query) use ($datemin) {
                        if (trim($datemin)) {
                            $query->whereDate('created_at', '>=', $datemin);
                        }
                    })
                    ->when($datemax, function ($query) use ($datemax) {
                        if (trim($datemax)) {
                            $query->whereDate('created_at', '<=', $datemax);
                        }
                    })->count()
            ];
        } else {
            return view("admin.admin.index");
        }
    }
}

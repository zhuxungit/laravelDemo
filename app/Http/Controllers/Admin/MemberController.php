<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Admin\Member;

class MemberController extends Controller
{
    public function index()
    {
        $data = Member::get();

//        p($data);die;

        return view('admin.member.index',['data'=>$data]);
    }

    public function add()
    {
        return view('admin.member.add');
    }

}

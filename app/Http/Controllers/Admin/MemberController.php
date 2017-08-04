<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Admin\Member;
use Input;

class MemberController extends Controller
{
    public function index()
    {
        $data = Member::get();

//        p($data);die;

        return view('admin.member.index', ['data' => $data]);
    }

    public function add()
    {
        if (Input::method() == 'POST') {
            $all = Input::all();

            $result = Member::insert([
                'username' => $all['username'],
                'password' => bcrypt('123456'),
                'gender' => $all['gender'],
                'mobile' => $all['mobile'],
                'email' => $all['email'],
                'status' => $all['status'],
                'type' => $all['type'],
                'created_at' => date('Y-m-d H:i:s'),
            ]);
            return $result ? '1' : '0';
        } else {
            return view('admin.member.add');
        }

    }

}

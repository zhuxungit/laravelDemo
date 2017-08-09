<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use File;

class UploaderController extends Controller
{
    public function webuploader(Request $request)
    {
        //判断文件是否上传，以及判断是否上传成功
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            //重新命名文件
            $new = md5(time().$request->file('file')->getClientOriginalName()).'.'.$request->file('file')->getClientOriginalExtension();

            //保存上传文件
            Storage::disk('public')->put($new,File::get($request->file('file')->getRealPath()));

            //返回成功的结果
            return response()->json([
                'status'=>true,
                'message'=>'上传文件成功',
                'filepath'=>"/storage/".$new
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'上传文件失败'
            ]);
        }

    }
}
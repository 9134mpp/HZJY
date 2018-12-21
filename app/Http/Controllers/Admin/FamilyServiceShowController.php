<?php

namespace App\Http\Controllers\Admin;

use App\FamilyServiceShow;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FamilyServiceShowController extends Controller
{
    //设置用户权限
    public function __construct()
    {
        //
        $this->middleware('auth',[
            //除了查看的操作都需要登陆
            'except'=>['index'],

        ]);
    }
    //保存家庭服务
    // tagStatus  1 代表上线 2代表下线  3代表上线下线
    public  function store(Request $request,FamilyServiceShow $familyServiceShow){
        $this->validate($request,[
            'name'=>'required',
            'tel'=>'required',
        ],

            //自定义错误
            [
                'name.required'=>'姓名不能为空',
                'tel.required'=>'手机号为空',

            ]);
        //将数据保存在数据库中
        $familyServiceShow->create([
            'fs_id'=>$request->fsId,
            'name'=>$request->name,
            'note'=>$request->note,
            'tel'=>$request->tel,
            'status'=>1,
        ]);
        return redirect()->route('fs.index')->with('success','添加成功');
    }
    //家庭服务首页
    public function index(){
        $fsses= FamilyServiceShow::paginate(15);
        return view('FamilyServiceShow.index',['fsses'=>$fsses]);
    }

}

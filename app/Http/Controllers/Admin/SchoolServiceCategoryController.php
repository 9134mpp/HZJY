<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//起个别名防止冲突
use App\SchoolServiceCategory as Ssc;

class SchoolServiceCategoryController extends Controller
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
    //添加分类
    public function create(){
        return view('SchoolServiceCategory.add');
    }

    //保存分类
    public function store(Request $request){
        //数据验证
        $this->validate($request,[
            'name' => 'required',
        ],
            //自定义错误
            [
                'name.required'=>'分类名不能为空',

            ]);
        //将数据保存在数据库中
        Ssc::create([
            'name'=>$request->name,
            'status'=>1,//状态值 1：正常  2：异常
        ]);

        return redirect()->route('ssc.index')->with('success','添加成功');

    }
    //查看分类列表
    public function index(Ssc $ssc){
        $sscs=$ssc->all();
        return view('SchoolServiceCategory.index',compact('sscs'));
    }

    //回显分类信息
    public function edit(Ssc $ssc){
        return view('SchoolServiceCategory.edit',compact('ssc'));
    }

    //修改分类信息
    public function update(Request $request,Ssc $ssc){
        //数据验证
        $this->validate($request,[
            'name' => 'required',
            'status'=>'required'
        ],
            [
                'name.required'=>'用户名不能为空',
                'status.required'=>'状态不能为空',
            ]);

        $ssc->update([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('ssc.index')->with('success','修改成功');
    }

    //删除分类
    public function destroy(Ssc $ssc){
        $ssc->delete($ssc);
        return "success";
    }

}

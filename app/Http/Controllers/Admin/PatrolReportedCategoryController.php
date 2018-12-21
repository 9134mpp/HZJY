<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PatrolReportedCategory as Prc;

class PatrolReportedCategoryController extends Controller
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
        return view('PatrolReportedCategory.add');
    }

    //保存分类
    public function store(Request $request){
        //数据验证
        $this->validate($request,[
            'title' => 'required',
        ],
            //自定义错误
            [
                'title.required'=>'分类名不能为空',

            ]);
        //将数据保存在数据库中
        Prc::create([
            'title'=>$request->title,
            'status'=>1,//状态值 1：正常  2：异常
        ]);

        return redirect()->route('prc.index')->with('success','添加成功');

    }
    //查看分类列表
    public function index(Prc $prc){
        $prces=$prc->all();
        return view('PatrolReportedCategory.index',compact('prces'));
    }

    //回显分类信息
    public function edit(prc $prc){
        return view('PatrolReportedCategory.edit',compact('prc'));
    }

    //修改分类信息
    public function update(Request $request,Prc $prc){
        //数据验证
        $this->validate($request,[
            'title' => 'required',
            'status'=>'required'
        ],
            [
                'title.required'=>'用户名不能为空',
                'status.required'=>'状态不能为空',
            ]);

        $prc->update([
            'title'=>$request->title,
            'status'=>$request->status
        ]);
        return redirect()->route('prc.index')->with('success','修改成功');
    }

    //删除分类
    public function destroy(Prc $prc){
        $prc->delete($prc);
        return "success";
    }

}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//取一个家庭服务分类别名
use App\FamilyServiceCategory as Fsc;
use App\FamilyService;

class FamilyServiceCategoryController extends Controller
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
    //添加家庭服务分类
    public function create(){
        return view('fsc.add');
    }

    //保存家庭服务分类
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
       Fsc::create([
            'name'=>$request->name,
            'status'=>1,//状态值 1：正常  2：异常
        ]);

        return redirect()->route('fsc.index')->with('success','添加成功');

    }
    //查看家庭服务分类列表
    public function index(Fsc $fsc){
        $fscs=$fsc->all();
        return view('fsc.index',compact('fscs'));
    }

    //回显家庭服务分类信息
    public function edit(Fsc $fsc){
        return view('fsc.edit',compact('fsc'));
    }

    //修改家庭服务分类信息
    public function update(Request $request,Fsc $fsc){
        //数据验证
        $this->validate($request,[
            'name' => 'required',
            'status'=>'required'
        ],
            [
                'name.required'=>'用户名不能为空',
                'status.required'=>'状态不能为空',
            ]);

        $fsc->update([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('fsc.index')->with('success','修改成功');
    }

    //删除家庭服务分类
    public function destroy(Fsc $fsc,FamilyService $fs){

        $fs->where('fsc_id',$fsc->id)->delete();
        $fsc->delete($fsc);

        return "success";
    }

}

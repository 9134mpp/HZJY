<?php

namespace App\Http\Controllers\Admin;

use App\IsMe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IsMeCategory;

class IsMeCategoryController extends Controller
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
    //添加关于我分类
    public function create(){
        return view('IsMeCategory.add');
    }

    //保存关于我分类
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
        IsMeCategory::create([
            'name'=>$request->name,
            'status'=>1,//状态值 1：正常  2：异常
        ]);

        return redirect()->route('imc.index')->with('success','添加成功');

    }
    //查看关于我分类列表
    public function index(IsMeCategory $imc){
        $imcs=$imc->all();
        return view('IsMeCategory.index',compact('imcs'));
    }

    //回显关于我分类信息
    public function edit(IsMeCategory $imc){
        return view('IsMeCategory.edit',compact('imc'));
    }

    //修改关于我分类信息
    public function update(Request $request,IsMeCategory $imc){
        //数据验证
        $this->validate($request,[
            'name' => 'required',
            'status'=>'required'
        ],
            [
                'name.required'=>'分类名不能为空',
                'status.required'=>'状态不能为空',
            ]);

        $imc->update([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('imc.index')->with('success','修改成功');
    }

    //删除关于我分类
    public function destroy(IsMeCategory $imc,IsMe $im){
        $im->where('imc_id',$imc->id)->delete();
        $imc->delete($imc);
        return "success";
    }
}

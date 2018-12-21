<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
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
    //
    //添加权限
    public function create(){
        return view('permission.add');
    }
    //查看权限
    public function store(Request $request){
        //验证数据
        $this->validate($request,[
            'name'=>'required',
            'describe'=>'required',
        ],
            //自定义提示
            [
                'name.required'=>'权限名不能为空',
                'describe.required'=>'权限地址不能为空',
            ]);

        //将数据保存在数据库中
        Permission::create(['name'=>$request->name,'describe'=>$request->describe]);
        return redirect()->route('permission.index')->with('success','添加成功');

    }
    //查看权限
    public function index(Permission $permission){
        $permissions=$permission->all();
        return view('permission.index',compact('permissions'));
    }

    //修改回显权限
    public function edit(Permission $permission){
        return view('permission.edit',compact('permission'));
    }
    //修改权限
    public function update(Request $request,Permission $permission){
        //验证数据
        $this->validate($request,[
            'name'=>'required',
            'describe'=>'required',
        ],
            //自定义提示
            [
                'name.required'=>'权限名不能为空',
                'describe.required'=>'权限地址不能为空',
            ]);
        $permission->update([
            'name'=>$request->name,
            'describe'=>$request->describe
        ]);
        return redirect()->route('permission.index')->with('success','添加成功');
    }
    //删除权限
    public function destroy(Permission $permission){
        $permission->delete($permission);
        return "success";
    }
}

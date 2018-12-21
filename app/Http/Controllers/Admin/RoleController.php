<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\Types\Compound;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
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
    //添加角色
    public function create(Permission $permission){
        $permissions=$permission->all();
        return view('Role.add',compact('permissions'));
    }
    //保存添加的角色
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'permission'=>'required',
        ],
            //自定义错误提示
            [
                'name.required'=>'角色名不能为空',
                'permission'=>'角色权限不能为空',
            ]);
        $role=Role::create(['name'=>$request->name]);
        $role->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success','添加成功');
    }
    //角色列表
    public function index(Role $role){
        $roles=$role->all();
        return view('Role.index',compact('roles'));
    }
    //修改角色
    public function edit(Role $role,Permission $permission){
        $permissions=$permission->all();
        return view('Role.edit',compact('role','permissions'));
    }
    //保存修改的角色
    public function update(Request $request,Role $role){
        $this->validate($request,[
            'name'=>'required',
            'permission'=>'required',
        ],
            //自定义错误提示
            [
                'name.required'=>'角色名不能为空',
                'permission'=>'角色权限不能为空',
            ]);
        $role->update(['name'=>$request->name]);
        $role->syncPermissions($request->permission);
        return redirect()->route('role.index')->with('success','修改成功');

    }

    //删除角色
    public function destroy(Role $role){
        $role->delete($role);
        return 'success';
    }


}

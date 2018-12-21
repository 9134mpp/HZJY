<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RbacController extends Controller
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
    //添加权限
    public function index(){
        //添加权限
        // $ permission  =  Permission :: create（[ ' name '  =>  ' edit articles ' ]）;

        //添加角色
        //$ role  =  Role :: create（[ ' name '  =>  ' writer ' ]）;

        //给角色赋予相应权限(多个权限)
       // $ role - > syncPermissions（$ permissions）;
        //$ permission - > syncRoles（$ roles）;


        //删除相应权限
        //$ role - > revokePermissionTo（$ permission）;
        //$ permission - > removeRole（$ role）;


    }
}

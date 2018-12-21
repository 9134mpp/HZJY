<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use App\Nav;
class NavController extends Controller
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
    //查看导航
    public function index(){
        $navs = Nav::paginate(10);
        return view('nav.index',compact('navs'));
    }
    //添加导航菜单
    public function create(){
        $permissions = Permission::all();
        $navs = Nav::where('pid',0)->get();
        return view('nav.add',compact('navs','permissions'));
    }
    //保存添加
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'pid'=>'required',
            'url'=>'required',
        ]);
        //查询URL地址/路由在权限表中的对应id
        $request->url!='无'?$id=Permission::where('name',$request->url)->first()->id : $id=0;
        Nav::create([
            'name'=>$request->name,
            'url'=>$request->url,
            'permission_id'=>$id,
            'pid'=>$request->pid
        ]);
        return redirect()->route('nav.index')->with('success','添加成功');
    }
    //修改导航菜单
    public function edit(Nav $nav){
        //查询所有权限和一级菜单
        $permissions = Permission::all();
        $navs = Nav::where('pid',0)->get();
        return view('nav.edit',compact('nav','navs','permissions'));
    }
    //保存修改
    public function update(Nav $nav,Request $request){
        $this->validate($request,[
            'name'=>'required',
        ]);
        //查询URL地址/路由在权限表中的对应id
        $request->url!='无'?$id=Permission::where('name',$request->url)->first()->id : $id=0;
        $nav->update([
            'name'=>$request->name,
            'url'=>$request->url,
            'permission_id'=>$id,
            'pid'=>$request->pid
        ]);
        return redirect()->route('nav.index')->with('success','修改导航菜单成功');
    }
    //删除导航菜单
    public function destroy(Nav $nav){
        $nav->delete();
        return redirect()->route('nav.index')->with('success','删除导航成功');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\AddOur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Compound;

class AddOurController extends Controller
{
    //设置用户权限
    public function __construct()
    {
        //
        $this->middleware('auth', [
            //除了查看的操作都需要登陆
            'except' => ['index'],

        ]);
    }

    //添加职位
    public function create()
    {
        return view('AddOur.add');
    }

    //保存添加
    public function store(Request $request)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required',
            'contents' => 'required'
        ],
            //自定义错误
            [
                'name.required' => '职位不能为空',
                'contents.required' => '岗位内容不能为空',

            ]);
        //将数据保存在数据库中
        AddOur::create([
            'name' => $request->name,
            'content' => $request->contents,
            'status' => 1,//状态值 1：正常  2：异常
        ]);

        return redirect()->route('AddOur.index')->with('success', '添加成功');

    }

    //首页
    public function index()
    {
        $addOurs = AddOur::paginate(15);;
        return view('AddOur.index', compact('addOurs'));
    }

    //修改
    public function edit(AddOur $addOur)
    {
        return view('AddOur.edit', compact('addOur'));

    }

    //保存修改
    public function update(Request $request, AddOur $addOur)
    {
        //数据验证
        $this->validate($request, [
            'name' => 'required',
            'contents' => 'required',
            'status' => 'required'
        ],
            //自定义错误
            [
                'name.required' => '职位不能为空',
                'contents.required' => '岗位内容不能为空',
                'status.required' => '状态不能为空',

            ]);
        //将数据保存在数据库中
        $addOur->update([
            'name' => $request->name,
            'content' => $request->contents,
            'status' => $request->status,//状态值 1：正常  2：异常
        ]);

        return redirect()->route('AddOur.index')->with('success', '修改成功');

    }

    //删除家庭服务分类
    public function destroy(AddOur $addOur)
    {
        $addOur->delete($addOur);
        return "success";
    }
}


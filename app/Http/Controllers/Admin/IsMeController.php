<?php

namespace App\Http\Controllers\Admin;

use App\IsMe;
use App\IsMeCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IsMeController extends Controller
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
    //添加关于我们
    public function create(IsMeCategory $imc){
        $imcs=$imc->all();
        return view('IsMe.add',compact('imcs'));
    }
    //保存关于我们
    public  function store(Request $request,IsMe $isme){
        //数据验证
        $this->validate($request,[
            'imcId' => 'required',
            'contents'=>'required',
        ],

            //自定义错误
            [
                'imcId.required'=>'分类名不能为空',
                'contents.required'=>'文章详情不能为空',

            ]);

        //将数据保存在数据库中
        $isme->create([
            'imc_id'=>$request->imcId,
            'content'=>$request->contents,
            'status'=>1,
        ]);
        return redirect()->route('im.index')->with('success','添加成功');
    }
    //关于我们首页
    public function index(){
        $ismes=IsMe::paginate(15);
        return view('IsMe.index',['ismes'=>$ismes]);
    }
    //回显示关于我们页面
    public function edit(IsMeCategory $imc,IsMe $im){
        $imcs=$imc->all();
        return view('IsMe.edit',compact('imcs','im'));
    }
    //保存修改
    public function update(Request $request,IsMe $im){
        //数据验证
        $this->validate($request,[
            'imcId' => 'required',
            'contents'=>'required',
            'status'=>'required'
        ],

            //自定义错误
            [
                'imcId.required'=>'分类名不能为空',
                'title.required'=>'标题不能为空',
                'contents.required'=>'文章详情不能为空',
                'status.required'=>'状态不能为空',

            ]);

        //将数据保存在数据库中
        $im->update([
            'imc_id'=>$request->imcId,
            'content'=>$request->contents,
            'status'=>$request->status,
        ]);

        return redirect()->route('im.index')->with('success','修改成功');
    }
    //删除关于我们
    public function destroy(IsMe $im){
        $im->delete($im);
        return "success";
    }
}

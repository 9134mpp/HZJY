<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PublicClass;

class PublicClassController extends Controller
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
    public function create(){
        return view('PublicClass.add');
    }

    public function store(Request $request,PublicClass $publicclass){
        //数据验证
        $this->validate($request,[
            'title'=>'required',
            'teacher'=>'required',
            'contents'=>'required',
            'img'=>'required',
            'video'=>'required'
        ],//自定义提示
            [
                'title.required'=>'标题不能为空',
                'teacher.required'=>'教师简介不能为空',
                'contents.required'=>'简介不能为空',
                'img.required'=>'图片不能为空',
                'video.required'=>'视频不能为空',

            ]);
        $publicclass->create([
            'title'=>$request->title,
            'teacher'=>$request->teacher,
            'content'=>$request->contents,
            'img'=>$request->img,
            'video'=>$request->video,
            'onclick'=>0,
            'status'=>1,
        ]);
        return redirect()->route('pc.index')->with('success','添加成功');
    }
    //显示公共课
    public function index(){
            $publicclasses=PublicClass::paginate(15);
        return view('PublicClass.index',compact('publicclasses'));
    }

    //回显示公开课页面
    public function edit(PublicClass $pc){
        return view('PublicClass.edit',compact('pc'));
    }
    //保存修改
    public function update(Request $request,PublicClass $pc){
        //数据验证
        $this->validate($request,[
            'title'=>'required',
            'teacher'=>'required',
            'img'=>'required',
            'contents'=>'required',
            'video'=>'required'
        ],
            //自定义提示
            [
                'title.required'=>'标题不能为空',
                'teacher.required'=>'教师简介不能为空',
                'img.required'=>'图片不能为空',
                'contents.required'=>'简介不能为空',
                'video.required'=>'视频不能为空',
            ]);

        //将数据保存在数据库中
        $pc->update([
            'title'=>$request->title,
            'teacher'=>$request->teacher,
            'img'=>$request->img,
            'content'=>$request->contents,
            'video'=>$request->video,
            'status'=>$request->status,
        ]);
        return redirect()->route('pc.index')->with('success','修改成功');
    }
    //删除公开课
    public function destroy(PublicClass $pc){
        $pc->delete($pc);
        return "success";
    }

}

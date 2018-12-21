<?php

namespace App\Http\Controllers\Admin;

use App\SchoolServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\SchoolService;


class SchoolServiceController extends Controller
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
    //添加家庭服务
    public function create(SchoolServiceCategory $ssc){
        $sscs=$ssc->all();
        return view('SchoolService.add',compact('sscs'));
    }
    //保存家庭服务
    public  function store(Request $request,SchoolService $ss){
        //数据验证

        $this->validate($request,[
            'sscId' => 'required',
            'title'=>'required',
            'contents'=>'required',
            'cover'=>'required | image',
        ],

            //自定义错误
            [
                'sscId.required'=>'分类名不能为空',
                'title.required'=>'标题不能为空',
                'contents.required'=>'文章详情不能为空',
                'cover.required'=>'封面不能为空',
                'cover.image'=>'图片格式不正确只支持png,jpg.gif.bmp.svg',

            ]);
       //dd($request->file('cover'));

            $path=$request->file('cover')->store('public/SchoolService');

        //将数据保存在数据库中
        $ss->create([
            'ssc_id'=>$request->sscId,
            'title'=>$request->title,
            'content'=>$request->contents,
            'img'=>$path,
            'status'=>1,
        ]);

        return redirect()->route('ss.index')->with('success','添加成功');
    }
    //家庭服务首页
    public function index(){
        $sses = SchoolService::paginate(3);
        return view('SchoolService.index',['sses'=>$sses]);
    }
    //回显示家庭服务页面
    public function edit(SchoolServiceCategory $ssc,SchoolService $ss){
        $ssces=$ssc->all();
        return view('SchoolService.edit',compact('ssces','ss'));
    }
    //保存修改
    public function update(Request $request,SchoolService $ss){
        //数据验证
        $this->validate($request,[
            'sscId' => 'required',
            'title'=>'required',
            'contents'=>'required',
            'cover'=>'required|image',
        ],

            //自定义错误
            [
                'sscId.required'=>'分类名不能为空',
                'title.required'=>'标题不能为空',
                'contents.required'=>'文章详情不能为空',
                'cover.required'=>'封面不能为空',
                'cover.image'=>'封面格式不正确 只支持.pnj.jpg.gif格式',

            ]);
            $path=$request->file('cover')->store('public/SchoolService');
        //将数据保存在数据库中
        $ss->update([
            'ssc_id'=>$request->sscId,
            'title'=>$request->title,
            'content'=>$request->contents,
            'img'=>$path,
            'status'=>1,
        ]);
        return redirect()->route('ss.index')->with('success','修改成功');
    }
    //删除管理员
    public function destroy(SchoolService $ss){
        $ss->delete($ss);
        return "success";
    }

}

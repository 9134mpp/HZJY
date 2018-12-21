<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FamilyServiceCategory as Fsc;
use App\FamilyService as Fs;
use App\FamilyServiceShow ;

class FamilyServiceController extends Controller
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
    public function create(Fsc $fsc){
        $fscs=$fsc->all();
        return view('FamilyService.add',compact('fscs'));
    }
    //保存家庭服务
    // tagStatus  1 代表上线 2代表下线  3代表上线下线
    public  function store(Request $request,Fs $fs){
        //数据验证
        $this->validate($request,[
            'fscId' => 'required',
            'title'=>'required',
            'contents'=>'required',
            'tagStatus'=>'required',
            'img'=>'required'
        ],

            //自定义错误
            [
                'fscId.required'=>'分类名不能为空',
                'title.required'=>'标题不能为空',
                'contents.required'=>'文章详情不能为空',
                'tagStatus.required'=>'未选择线上线下',
                'img.required'=>'图片不能为空',

            ]);
        $tagStatuses=$request->tagStatus;
        $data=0;
        foreach ($tagStatuses as $tagStatus){
            $data+=$tagStatus;
        }
        //将数据保存在数据库中
        $fs->create([
            'fsc_id'=>$request->fscId,
            'title'=>$request->title,
            'content'=>$request->contents,
            'tagStatus'=>$data,
            'img'=>$request->img,
            'status'=>1,
        ]);
        return redirect()->route('fs.index')->with('success','添加成功');
    }
    //家庭服务首页
    public function index(){
        $fss = Fs::paginate(15);
        return view('FamilyService.index',['fss'=>$fss]);
    }
    //回显示家庭服务页面
    public function edit(Fsc $fsc,Fs $fs){
        $fscs=$fsc->all();
        return view('FamilyService.edit',compact('fscs','fs'));
    }
    //保存修改
    public function update(Request $request,Fs $fs){
        //数据验证
        $this->validate($request,[
            'fscId' => 'required',
            'title'=>'required',
            'contents'=>'required',
            'tagStatus'=>'required',
        ],

            //自定义错误
            [
                'fscId.required'=>'分类名不能为空',
                'title.required'=>'标题不能为空',
                'contents.required'=>'文章详情不能为空',
                'tagStatus.required'=>'未选择线上线下',

            ]);
        $tagStatuses=$request->tagStatus;
        $data=0;
        foreach ($tagStatuses as $tagStatus){
            $data+=$tagStatus;
        }

        //将数据保存在数据库中
        $fs->update([
            'fsc_id'=>$request->fscId,
            'title'=>$request->title,
            'content'=>$request->contents,
            'img'=>$request->img,
            'tagStatus'=>$data,
            'status'=>$request->status,
        ]);
        return redirect()->route('fs.index')->with('success','修改成功');
    }
    //删除家庭服务
    public function destroy(Fs $fs,FamilyServiceShow $FamilyServiceShow){

        $FamilyServiceShow->where('fs_id',$fs->id)->delete();
        $fs->delete($fs);
        return "success";
    }

    //查看详情
    public function show(Fs $fs){
        return view('FamilyService.show',compact('fs'));
    }

}

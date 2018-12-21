<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PatrolReported as Pr;
use App\PatrolReportedCategory as Prc;
class PatrolReportedController extends Controller
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
    //添加巡讲和报道
    public function create(Prc $prc){
        $prces=$prc->all();
        return view('PatrolReported.add',compact('prces'));
    }
    //保存巡讲和报道
    public  function store(Request $request,Pr $pr){
        //数据验证
        $this->validate($request,[
            'PrcId' => 'required',
            'title'=>'required',
            'contents'=>'required',
            'date'=>'required',
        ],

            //自定义错误
            [
                'PrcId.required'=>'分类名不能为空',
                'title.required'=>'标题不能为空',
                'contents.required'=>'文章内容不能为空',
                'date.required'=>'日期不能空',

            ]);
        //将数据保存在数据库中
        $pr->create([
            'prc_id'=>$request->PrcId,
            'title'=>$request->title,
            'content'=>$request->contents,
            'date'=>$request->date,
            'status'=>1,
        ]);
        return redirect()->route('pr.index')->with('success','添加成功');
    }
    //巡讲和报道首页
    public function index(){
        $pres = Pr::paginate(15);
        return view('PatrolReported.index',compact('pres'));
    }
    //回显示巡讲和报道页面
    public function edit(Prc $prc,Pr $pr){
        $prcs=$prc->all();
        return view('PatrolReported.edit',compact('prcs','pr'));
    }
    //保存修改
    public function update(Request $request,pr $pr){
        //数据验证
        $this->validate($request,[
            'prcId' => 'required',
            'title'=>'required',
            'contents'=>'required',
            'status'=>'required',
        ],

            //自定义错误
            [
                'prcId.required'=>'分类名不能为空',
                'title.required'=>'标题不能为空',
                'contents.required'=>'文章详情不能为空',
                'status.required'=>'未选择状态',

            ]);

        //将数据保存在数据库中
        $pr->update([
            'prc_id'=>$request->prcId,
            'title'=>$request->title,
            'content'=>$request->contents,
            'status'=>$request->status,
        ]);
        return redirect()->route('pr.index')->with('success','修改成功');
    }
    //删除巡讲和报道
    public function destroy(pr $pr){

        $pr->delete($pr);
        return "success";
    }
}

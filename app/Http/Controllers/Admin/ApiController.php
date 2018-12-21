<?php

namespace App\Http\Controllers\Admin;

use App\PublicClass;
use App\SchoolService;
use App\SchoolServiceCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FamilyService;
use App\FamilyServiceCategory;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //家庭服务
    public function FamilyService(){
        //返回格式
        /*data=[
            [
                '家庭教育'=>[
              [
                    'title'=>hai,
                     content=>ha,

                ],
                [
                    'title'=>hai,
                     content=>ha,

                 ]


                ],
        [
                '家庭教育12'=>[
                    'title'=>hai,
                      content=>ha,

                ],

            ]

        ]*/
        //取出所有分类
        $fsces=DB::table('family_service_categories')
            ->select('id','name','status')
            ->where('status',1)
            ->get();
        //取出分类下的所有数据

        $data=[];
       foreach ($fsces as $fsc){
           $fss=DB::table('family_services')
               ->select('title','content','fsc_id')
               ->where([['status','>=',0],['fsc_id','=',$fsc->id]])
               ->get();
           $family=[];
           foreach ($fss as $fs){
               $family[]=[
                   'title'=>$fs->title,
                   'content'=>$fs->content,
               ];

           }
           $data[]=[
               $fsc->name=>$family,
           ];
       }
       return $data;


    }
    //学校服务管理
    public function SchoolService(SchoolServiceCategory $ssc ,SchoolService $ss){
        //取出所有分类
        $fsces=$ssc
            ->select('id','name','status')
            ->where('status',1)
            ->get();
        //取出分类下的所有数据

        $data=[];
        foreach ($fsces as $fsc){
            $fss=$ss
                ->select('title','content')
                ->where([['status','>=',0],['ssc_id','=',$fsc->id]])
                ->get();
            $family=[];
            foreach ($fss as $fs){
                $family[]=[
                    'title'=>$fs->title,
                    'content'=>$fs->content,
                ];

            }
            $data[]=[
                $fsc->name=>$family,
            ];
        }
        return $data;


    }
    //巡讲与报道
    public function PatrolReported(){
        //取出所有分类
        $fsces=DB::table('patrol_reported_categories')
            ->select('id','title','status')
            ->where('status',1)
            ->get();
        //取出分类下的所有数据

        $data=[];
        foreach ($fsces as $fsc){
            $fss=DB::table('patrol_reporteds')
                ->select('title','content','prc_id')
                ->where([['status','>=',0],['prc_id','=',$fsc->id]])
                ->get();
            $family=[];
            foreach ($fss as $fs){
                $family[]=[
                    'title'=>$fs->title,
                    'content'=>$fs->content,
                ];

            }
            $data[]=[
                $fsc->title =>$family,
            ];
        }
        return $data;

    }
    //关于我们
    public function IsMe(){
        //取出所有分类
        $fsces=DB::table('is_me_categories')
            ->select('id','name')
            ->where('status',1)
            ->get();
        //取出分类下的所有数据

        $data=[];
        foreach ($fsces as $fsc){
            $fss=DB::table('is_mes')
                ->select('content')
                ->where([['status','>=',0],['imc_id','=',$fsc->id]])
                ->get();
            $family=[];
            foreach ($fss as $fs){
                $family[]=[
                    'content'=>$fs->content,
                ];

            }
            $data[]=[
                $fsc->name =>$family,
            ];
        }
        return $data;

    }
    //公开课
    public function PublicClass(PublicClass $publicClass){
        $pces=$publicClass
            ->select('img','video','title','content','teacher')
            ->where('status',1)
            ->get();
        $data=[];
        foreach ($pces as $pc){
            $pce[]=[
                'title'=>$pc->title,
                'content'=>$pc->content,
                'img'=>$pc->img,
                'video'=>$pc->video,
                'teacher'=>$pc->teacher
            ];
            $data[]=$pce;

        }
        return $data;

    }

    //

}

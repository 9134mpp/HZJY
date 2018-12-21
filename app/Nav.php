<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Nav extends Model
{
    protected $fillable=[
        'name','url','permission_id','pid',
    ];

    //生成导航栏
 /*   public static function getNav(){
       $html='';
        //生成导航栏菜单组
      /*  $navs=Nav::where('pid',0)->get();
      $navs=[
        [
            'id'=>'1',
            'name'=>'家庭服务',
             'pid'=>0,
             'url'=>'fs/index',
        ]，
         [
            'id'=>2,
             'name'=>'管理员',
             'pid'=>0,
              'url'=>'user/index',
      ]
      ]*/
        //遍历一级菜单生成html
           // foreach ($navs as $nav){
               // $html.='<ul class="nav navbar-nav">
            /*    <li class="active">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$nav.['name'].' <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">二级菜单</a></li>*/
                      //';

           // }

            //return $html;
   // }

   /* public static function getNav(){
        $navs=Nav::where('pid',0)->get();
        //dd($navs);
        $html='';
        $nav_html = '';
        foreach($navs as $nav) {
            //dd($nav->name);
            $children=Nav::where('pid',$nav['id'])->get();
            //dd($children);
            $children_html = '';
            foreach($children as $child) {
                if(Auth::user()->can($child['url'])){
                    $children_html.='<li><a href="'.$child['url'].'">'.$child['name'].'</a></li>';
                }
            }
            //panduan zicaidan shifou you xianshi
            if($children_html){
                $nav_html .= '<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' .$nav['name'].'<span class="caret"></span></a>
                    <ul class="dropdown-menu">';
                $nav_html.= $children_html;
                $nav_html.='</ul></li>';
            }
        }
        $html .= $nav_html;
        return $html;
    }*/

}

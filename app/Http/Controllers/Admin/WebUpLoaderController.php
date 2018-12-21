<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class WebUpLoaderController extends Controller
{
    //图片类
    public function create(Request $request){

        $path=$request->file('file')->store('public/img');
        return ['path'=>Storage::url($path)];

    }
    //视频类
    public function video(Request $request){
        $video=$request->file('file')->store('public/video');
        //return dd($video);
        return ['video'=>Storage::url($video)];
    }
}

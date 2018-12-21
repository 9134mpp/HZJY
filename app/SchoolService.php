<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolService extends Model
{
    protected $fillable = [
        'ssc_id', 'title','status','img','content',
    ];
    //定义模型关联 学校服务关联学校服务分类(反向)
    public function p()
    {
        return $this->belongsTo('App\SchoolServiceCategory','ssc_id');
    }

}

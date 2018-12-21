<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatrolReported extends Model
{
    //
    public $fillable = [
        'prc_id','title','content','date','status'
    ];
    //定义模型关联 巡讲与媒体关联分类(反向)
    public function p()
    {
        return $this->belongsTo('App\PatrolReportedCategory','prc_id');
    }
}

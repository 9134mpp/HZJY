<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyServiceShow extends Model
{
    //定义模型关联 家庭服务详情关联家庭服务(反向)
    public function p()
    {
        return $this->belongsTo('App\FamilyService','fs_id');
    }

    protected $fillable = [
        'fs_id','tel', 'note','status','name',
    ];
}

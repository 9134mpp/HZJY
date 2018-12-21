<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FamilyServiceCategory;
class FamilyService extends Model
{
    //定义模型关联 家庭服务关联家庭服务分类(反向)
    public function p()
    {
        return $this->belongsTo('App\FamilyServiceCategory','fsc_id');
    }

    protected $fillable = [
        'fsc_id','title', 'content','tagStatus','status','img',
    ];

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IsMe extends Model
{
    //定义模型关联 关于我们关联关于我们分类(反向)
    public function p()
    {
        return $this->belongsTo('App\IsMeCategory','imc_id');
    }

    protected $fillable = [
        'imc_id','content','status',
    ];
}

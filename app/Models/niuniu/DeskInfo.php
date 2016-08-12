<?php

namespace App\Models\niuniu;

use Illuminate\Database\Eloquent\Model;

/*
 * 开桌 模型 与局次一对多关系
 * */
class DeskInfo extends Model
{
    //
    protected $table='deskinfo';

    //获取所有开局
    public function matchs()
    {
        return $this->hasMany('App\Models\niuniu\MatchInfo','deskId');
            
    }
}

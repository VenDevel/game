<?php

namespace App\Models\niuniu;

use Illuminate\Database\Eloquent\Model;

/*
 * 玩家基本信息
 * */
class PlayerInfo extends Model
{
    protected $fillable=['number','nickName','realName','wechatid','status','deskNum','createTime','parentId'];
    protected $table='playerinfo';
}

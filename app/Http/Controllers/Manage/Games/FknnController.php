<?php
/**
 * Created by PhpStorm.
 * User: tangyong
 * Date: 16/8/9
 * Time: 下午3:31
 */
namespace App\Http\Controllers\Manage\Games;

use App\Http\Controllers\Manage\BaseController;
use Illuminate\Http\Request;
use App\Models\niuniu\PlayerInfo;

class FknnController extends BaseController{

    public function index(){

        //读取
        $list= PlayerInfo::orderBy('id', 'asc')->get();
        
        return view('manage.games.fknn.index',['model'=>'games','menu'=>'fknn','list'=>$list]);
    }
    
    /*
     * 创建玩家
     * */
    public function createplayer(Request $request)
    {
        $item=new PlayerInfo();
        if ($request->isMethod('post')){
            //提交
            $input=$request->all();
            $item->fill($input);
            $item->status=1;
            $item->createTime=date('y-m-d h:i:s',time()); //获取当前时间
            $item->parentId=0; //所属上级
            $item->save();
            if ($item){
                return Redirect('/manage/games/fknn/');
            }else{
                return Redirect::back()->withInput()->withErrors('保存失败！');
            }
        }
        return view('manage.games.fknn.createplayer',['model'=>'games','menu'=>'fknn','item'=>$item]);
    }
}
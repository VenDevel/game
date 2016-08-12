<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AllTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('System_Enterprise')) {
            Schema::create('System_Enterprise', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('pid');//所属上级
                $table->string('name');//企业全称
                $table->string('short_name');//企业简称
                $table->string('logo')->nullable();//标志
                $table->string('legal_person')->nullable();//法人代表
                $table->date('found_time')->nullable();//成立时间
                $table->string('phone')->nullable();//联系电话
                $table->string('fax')->nullable();//传真号码
                $table->string('address')->nullable();//地址
                $table->string('slogan')->nullable();//口号
                $table->string('abstract')->nullable();//企业简介
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 系统参数
        if (!Schema::hasTable('System_Config')) {
            Schema::create('System_Config', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');
                $table->string('name');
                $table->string('logo')->nullable();
                $table->string('domain')->nullable();
                $table->string('assets_domain')->nullable();
                $table->string('qiniu_access')->nullable();
                $table->string('qiniu_secret')->nullable();
                $table->string('qiniu_bucket_name')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 用户表
        if (!Schema::hasTable('System_User')) {
            Schema::create('System_User', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');
                $table->string('name');
                $table->string('email');
                $table->string('mobile');
                $table->string('password')->nullable();
                $table->integer('email_check')->default(1);//状态(0已验证、1未验证)
                $table->integer('mobile_check')->default(1);//状态(0已验证、1未验证)
                $table->integer('state')->default(0);//状态(0正常、1禁用)
                $table->string('remember_token')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 用户详情表
        if (!Schema::hasTable('System_User_Info')) {
            Schema::create('System_User_Info', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('uid');
                $table->string('name');//真实姓名
                $table->integer('sex')->default(0);//性别(0未知、1男、2女)
                $table->string('id_card')->nullable();//身份证号
                $table->date('birthday')->nullable();//生日
                $table->string('addres')->nullable();//地址
                $table->string('mobile')->nullable();//手机号
                $table->string('tel')->nullable();//办公电话
                $table->string('fax')->nullable();//传真
                $table->string('qq')->nullable();//qq
                $table->string('weibo')->nullable();//微博
                $table->string('weixin')->nullable();//微信号

                $table->timestamps();
                $table->softDeletes();
            });
        }
        // 密码重置表
        if (!Schema::hasTable('System_PassWord_Resets')) {
            Schema::create('System_PassWord_Resets', function (Blueprint $table) {
                $table->increments('id');
                $table->string('email')->unique();
                $table->string('token')->nullable();
                $table->timestamps();
            });
        }
        // 角色表
        if (!Schema::hasTable('System_Role')) {
            Schema::create('System_Role', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('eid');
                $table->string('name')->unique();
                $table->string('display_name')->nullable();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
        // 用户角色对照表 (Many-to-Many)
        if (!Schema::hasTable('System_Role_User')) {
            Schema::create('System_Role_User', function (Blueprint $table) {
                $table->integer('user_id')->unsigned();
                $table->integer('role_id')->unsigned();

                $table->foreign('user_id')->references('id')->on('System_User')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->foreign('role_id')->references('id')->on('System_Role')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['user_id', 'role_id']);
            });
        }
        //权限表
        if (!Schema::hasTable('System_Permission')) {
            Schema::create('System_Permission', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->unique();
                $table->string('display_name')->nullable();
                $table->string('description')->nullable();
                $table->timestamps();
            });
        }
        // 角色权限对照表 (Many-to-Many)
        if (!Schema::hasTable('System_Permission_Role')) {

            Schema::create('System_Permission_Role', function (Blueprint $table) {
                $table->integer('permission_id')->unsigned();
                $table->integer('role_id')->unsigned();

                $table->foreign('permission_id')->references('id')->on('System_Permission')
                    ->onUpdate('cascade')->onDelete('cascade');
                $table->foreign('role_id')->references('id')->on('System_Role')
                    ->onUpdate('cascade')->onDelete('cascade');

                $table->primary(['permission_id', 'role_id']);
            });
        }

        // 基础数据分类 'name', 'code', 'abstract', 'state',
        if (!Schema::hasTable('System_Base_Type')) {
            Schema::create('System_Base_Type', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('eid')->default(0);//默认为0表示系统
                $table->string('code')->unique();
                $table->string('abstract')->nullable();
                $table->integer('state')->default(0);//0系统、1自定义
                $table->timestamps();
            });
        }
        // 基础数据
        if (!Schema::hasTable('System_Base_Data')) {
            Schema::create('System_Base_Data', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('tid');
                $table->integer('eid');
                $table->text('name');
                $table->text('value');
                $table->integer('sort')->default(0);
                $table->timestamps();
            });
        }


        if (!Schema::hasTable('System_Menu')) {
            //系统菜单
            Schema::create('System_Menu', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('model');
                $table->string('page');
                $table->string('url');
                $table->integer('parent_id');
                $table->string('open');
                $table->integer('is_display');
                $table->string('describe');
                $table->integer('sort');
                $table->integer('state');
                $table->timestamps();
            });

        }


        if (!Schema::hasTable('Weixin_Config')) {
            Schema::create('Weixin_Config', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('weiXin');
                $table->string('appID');
                $table->string('appSecret');
                $table->string('token');
                $table->string('mchId');
                $table->string('pay_key');
                $table->string('encodingAESKey');
                $table->string('admin_openId');
                $table->string('welcom');
                $table->timestamps();
            });

        }

        //玩家基本信息表
        if(!Schema::hasTable('playerinfo')){
            Schema::create('playerinfo',function (Blueprint $table){
                $table->increments('id'); //自增 主键ID
                $table->string('nickName',50);//昵称
                $table->string('realName',50); //真实姓名
                $table->string('phone',50); //手机号码
                $table->string('wechatId'); //微信登陆ID
                $table->integer('status'); //状态1 在线 2 离线
                $table->string('deskNum')->nullable(); //所在桌号,创建房间后生成
                $table->integer('autoBet')->default(0);//是否自动下注 0否(默认) 1 是
                $table->dateTime('createTime'); //创建时间
                $table->string('lastLoginIp',50);// 最后登陆IP地址
                $table->dateTime('lastLoginTime'); //最后登陆时间
                $table->integer('playerType');//账户类型  0 系统账户  1 代理商  2 普通玩家
                $table->integer('parentId');//所属上级用户ID
                $table->timestamps();
            });
        }

        /*
         * 开桌信息表
         * */
        if (!Schema::hasTable('deskinfo')){
            Schema::create('deskinfo',function (Blueprint $table){
               $table->increments('id'); //自增主键ID
                $table->string('number',20); //桌号
                $table->integer('type'); //桌类型 1 公共 2私有
                $table->string('password',50); //密码
                $table->integer('qzScore')->default(0); //抢庄最低分数
                $table->integer('qzWaitTime')->default(10); //抢庄等待时间,默认10秒
                $table->integer('kjWaitTime')->default(10); //开局等待时间,默认10秒
                $table->integer('kjLowMans')->default(2); //开局最低人数,默认2人
                $table->integer('status'); //当前桌的状态 1 进行中,2已结束
                $table->integer('createPlayerId');// 创建玩家ID
                $table->integer('dealerId')->nullable(); //本桌庄家ID
                $table->integer('autoQz')->default(0); //是否自动抢庄 0 否 1 是
                $table->timestamps();
            });
        }

        /*
         * 开局信息表
         * */
        if (!Schema::hasTable('matchinfo')){
            Schema::create('matchinfo',function (Blueprint $table){
               $table->increments('id'); //自增主键ID
                $table->integer('deskId'); //所属开桌ID
                $table->integer('status'); //状态 1 抢庄中  2投注中  3已结束
                $table->integer('qzScore')->nullable(); //本局抢庄积分
                $table->integer('dealerId')->nullable(); //本局庄家ID
                $table->timestamps();
            });
        }

        /*
         * 抢庄记录表
         * */
        if (!Schema::hasTable('matchinfo_qz')){
            Schema::create('matchinfo_qz',function (Blueprint $table){
                $table->increments('id'); //自增主键ID
                $table->integer('matchId'); //所属开局ID
                $table->integer('qzPlayerId'); //抢庄玩家ID
                $table->integer('qzAddScore'); //抢庄添加积分
                $table->integer('qzScore'); //抢庄底注
                $table->timestamps();
            });
        }

        /*
         * 下注记录表
         * */
        if (!Schema::hasTable('matchinfo_bets')){
            Schema::create('matchinfo_bets',function (Blueprint $table){
                $table->increments('id'); //自增主键ID
                $table->integer('matchId'); //所属局次ID
                $table->integer('playerId'); //玩家ID
                $table->integer('status'); //当前状态 0 待确认(默认)  1旁观  2下注
                $table->integer('betScore'); //下注积分
                $table->timestamps();
            });
        }

        /*
         * 局内发送消息通知记录表
         * */
        if (!Schema::hasTable('matchinfo_msg')){
            Schema::create('matchinfo_msg',function (Blueprint $table){
                $table->increments('id'); //自增主键ID
                $table->integer('matchId'); //所属局次ID
                $table->integer('playerId');// 发送消息的玩家ID
                $table->string('content',500); //消息内容
                $table->timestamps();
            });
        }

        /*
         * 投注最终结果表(开奖后记录)
         * */
        if (!Schema::hasTable('betresults')){
            Schema::create('betresults',function (Blueprint $table){
               $table->increments('id'); //自增主键ID
                $table->integer('playerId'); //玩家ID
                $table->integer('deskId');//所属桌次ID
                $table->integer('matchId'); //所属局次ID
                $table->integer('betScore');//下注积分
                $table->integer('point'); //原始点数,开牌分数
                $table->integer('type'); //结果类型1赢 2输 3平
                $table->integer('rate'); //倍率
                $table->integer('getScore'); //交易积分
                $table->timestamps();
            });
        }

        /*
         * 积分明细
         * */
        if (!Schema::hasTable('scoredetail')){
            Schema::create('scoredetail',function (Blueprint $table){
                $table->increments('id'); //主键自增ID
                $table->integer('playerId'); //玩家ID
                $table->integer('target');//收支方向 (1收入  2支出)
                $table->integer('sourceType'); //用途来源
                $table->integer('sourceId'); //来源玩家ID
                $table->integer('score'); //积分数
                $table->string('remark',500); //备注描述
                $table->timestamps();

            });
        }








 

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::drop('users');
//        Schema::drop('permission_role');
//        Schema::drop('permissions');
//        Schema::drop('role_user');
//        Schema::drop('roles');
    }
}

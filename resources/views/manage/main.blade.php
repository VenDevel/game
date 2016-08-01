@extends('layouts.manage')
@section("script")

@endsection

@section('content')
    <div class="page-content-side">
        <div class="system submenu">
            <div class="page-content-side-nav">系统设置</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/activity/">系统参数</a>
                <a target="main"
                   href="/supplier/activity/">用户管理</a> <a
                        target="main" href="/supplier/activity/">权限角色</a>
            </div>
        </div>
        <div class="member submenu">
            <div class="page-content-side-nav">会员中心</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/analysis/">会员管理</a>
                <a target="main" href="/supplier/operator/control/airways/">代理商管理</a>
            </div>
        </div>
        <div class="games submenu">
            <div class="page-content-side-nav">游戏项目</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/manage/games/nui/">疯狂牛牛</a>
                <a target="main" href="/supplier/operator/control/airways/">四川麻将</a>
            </div>
        </div>
        <div class="finance submenu">
            <div class="page-content-side-nav">财务结算</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/analysis/">收入分析</a>
                <a target="main" href="/supplier/operator/control/airways/">代理提成</a>
                <hr/>
                <a target="main" href="/supplier/operator/control/airways/">积分充值</a>
                <a target="main" href="/supplier/operator/control/airways/">积分明细</a>
            </div>
        </div>
        <div class="report submenu">
            <div class="page-content-side-nav">报表分析</div>
            <div class="page-content-side-menu ">
                <a target="main" href="/supplier/analysis/">今日上线分析</a>
                <a target="main" href="/supplier/operator/control/airways/">今日收入分析</a>
            </div>
        </div>
    </div>
@endsection
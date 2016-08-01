<!DOCTYPE html>
<html lang="zh-CN" ng-app="app">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>元佑游戏管理平台</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/js/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/base.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/resources/css/page.css') }}">
    @yield('style')

</head>
<body>

<div class="page">
    <div class="page-header">
        <div class="page-header-top">
            <div class="page-header-top-logo">{{Base::Config('name')}}</div>
            <div class="page-header-top-nav">
                <a href="{{url('/manage/userinfo')}}">  {{Base::user('name') }} </a> | <a
                        href="{{url('/logout')}}">退出</a>
            </div>
        </div>
        <div class="page-header-nav">
            <div class="page-header-nav-user">
                <div class="page-header-nav-user-img">
                    <i class="icon-fire" style="color: red;"></i>
                </div>
                {{Base::user('name')}}（管理员）
            </div>
            <div class="page-header-nav-menu">
              <span name="system"> 系统设置
                 </span><span name="member">会员中心
                 </span><span name="games">游戏项目
                 </span><span name="finance"> 财务结算
                 </span><span name="report"> 报表分析 </span>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <div class="page-content">
        @yield('content')
        <div class="page-content-area">
            <iframe id="main" name="main" src="{{url("/manage/home")}}" frameBorder="0"
                    width="100%" scrolling="auto"
                    height="100%"></iframe>
        </div>

    </div>
    <div class="page-footer">重庆元佑科技有限公司</div>
</div>


<script src="{{ asset('/resources/js/angularJs/angular1.5.5.min.js') }}"></script>
<script src="{{ asset('/resources/js/angularJs/angular-messages.min.js') }}"></script>
<script src="{{ asset('/resources/js/angularJs/angularBase.js') }}"></script>
<script src="{{ asset('/resources/js/jquery-2.1.1.min.js') }}"></script>
<script src="{{ asset('/resources/js/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/resources/js/layer/layer.js') }}"></script>
<script src="{{ asset('/resources/js/common.js') }}"></script>
<script type="text/javascript">

    $(function () {

        $(".page-header-nav-menu span").click(function () {
            $(".page-header-nav-menu span").removeClass("active");
            $(this).addClass("active");
            $(".submenu").hide();
            var name = $(this).attr("name");
            //alert($(this).attr("name"));
            $("." + name + "").show();
        });

        $(".page-content-side-nav").click(function () {
            $(".page-content-side-menu").hide();
            $(this).next().show();
        });
        $(".page-content-side-menu a").click(function () {
            $(".page-content-side-menu a").removeClass("active");
            $(this).addClass("active");
        });

    });
    //系统退出
    function exit() {
        //询问框
        layer.confirm('确认退出？', {
            btn: ['确认', '取消']
            //按钮
        }, function () {
            window.location.href = '/manage/login';

        });
    }

    //关于我们
    function about() {
        layer.open({
            type: 2,
            title: '关于我们',
            shadeClose: true,
            shade: 0.8,
            area: ['60%', '50%'],
            content: 'http://www.baidu.com/' //iframe的url
        });

    }
</script>
@yield('script')
</body>
</html>
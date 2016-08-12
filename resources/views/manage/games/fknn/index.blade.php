@extends('layouts.page')
@section('script')

@endsection

@section('content')
    <div class="page-list">
        <div class="row page-list-header">
            <div class="col-xs-8 text-left">
                <a href="{{url('/manage/games/fknn/createplayer')}}"
                   class="btn btn-primary">新增</a>
            </div>
            <div class="col-xs-4 text-right">

                <form method="get" cssClass="form-horizontal">
                    <div class="input-group">

                        <input type="text" class="form-control" placeholder="关键字"
                               name="key" value=""> <span class="input-group-btn">
								<button class="btn btn-default" type="submit">搜索</button>
							</span>

                    </div>
                </form>
            </div>
        </div>

        <div class="row page-list-body">
            <div class="col-md-12">
                <form method="Post" class="form-inline">
                    <fieldset>
                        <legend>玩家列表</legend>
                        <table class="table table-bordered table-hover  table-condensed">
                            <thead>
                            <tr style="text-align: center" class="text-center">
                                <th style="width: 80px;">玩家编号</th>
                                <th><a href="">昵称</a></th>
                                <th><a href="">姓名</a></th>
                                <th>玩家类型</th>
                                <th>最后登陆时间</th>
                                <th><a href="">状态</a></th>
                                <th><a href="">所在桌号</a></th>
                                <th style="width: 120px;">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $item)
                                    <tr>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->nickName}}</td>
                                        <td>{{$item->realName}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>
@endsection
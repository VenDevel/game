@extends('layouts.page')
@section('script')
@endsection

@section('content')
    <div class="row page-input">
        <div class="col-xs-12">
            <form class="form-horizontal" method="post" action="{{url('/manage/games/fknn/createplayer')}}">
                {!! csrf_field() !!}
                <div class="row page-input-header">
                    <div class="col-xs-2  text-left">
                        <button type="button" class="btn btn-default"
                                onclick="vbscript:window.history.back()">返回
                        </button>
                        <button type="submit" class="btn  btn-primary">保存</button>

                    </div>
                    <div class="col-xs-10 text-right"></div>
                </div>
                <div class="row page-input-body">
                    <div class="col-xs-12">
                        <fieldset>
                            <legend>玩家基本信息</legend>
                            <div class="form-group">
                                <label for="name" class="col-xs-2 control-label label-required">昵称：</label>
                                <div class="col-xs-10">
                                    <input id="nickName" name="nickName" class="form-control" type="text"
                                           value="{{$item->nickName}}"
                                           style="width: 200px;"/>

                                </div>
                            </div>

                            <div class="form-group">
                                <label for="realName"
                                       class="col-xs-2 control-label label-required">真是姓名：</label>
                                <div class="col-xs-10">
                                    <input id="realName" name="realName" class="form-control"
                                           style="width: 200px;"
                                           value="{{$item->realName}}" type="text"/>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="playerType"
                                       class="col-xs-2 control-label label-required">账户类型：</label>
                                <div class="col-xs-10">
                                    <select name="playerType" class="form-control">
                                        <option value="0">系统账户</option>
                                        <option value="1">代理商</option>
                                        <option value="2">普通玩家</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div clas="row page-input-footer">
                    <div class="col-xs-12">@include('common.errors')</div>
                </div>
            </form>
        </div>
    </div>
@endsection

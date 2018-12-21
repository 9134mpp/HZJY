@extends('layout.default')

@section('contents')
    <h1>修改加入我们</h1>
    @include('layout._errors')
    @include('layout._notice')
    @include('vendor.ueditor.assets')
    <form method="post" action="{{route('AddOur.update',[$addOur])}}" enctype="multipart/form-data">
        <div>
            <div class="form-group">
                <label>职位</label>
                <input type="text" name="name" class="form-control" value="{{$addOur->name}}">
            </div>
            <div class="form-group">
                <label>岗位内容</label>
                <!-- 编辑器容器 -->
                <script id="container" name="contents" type="text/plain">{!! $addOur->content !!}</script>
            </div>
            <div class="form-group">
                <label>状态</label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio1" value="1" @if($addOur->status>0)checked="checked" @endif> 正常
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio2" value="0" @if($addOur->status==0)checked="checked" @endif> 异常
                </label>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button>
        </div>
    </form>

@stop
@section('javascript')
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        ue.ready(function() {
            ue.execCommand('serverparam', '_token', '{{ csrf_token() }}'); // 设置 CSRF token.
        });
    </script>

@stop

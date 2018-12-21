@extends('layout.default')

@section('contents')
    <h1>添加加入我们</h1>
    @include('layout._errors')
    @include('layout._notice')
    @include('vendor.ueditor.assets')
    <form method="post" action="{{route('AddOur.store')}}" enctype="multipart/form-data">
    <div>
        <div class="form-group">
            <label>职位</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>岗位内容</label>
            <!-- 编辑器容器 -->
            <script id="container" name="contents" type="text/plain"></script>
            {{--<textarea class="form-control" rows="3" name="responsibilities" placeholder="请输入内容"></textarea>--}}
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

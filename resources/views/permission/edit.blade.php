@extends('layout.default')

@section('contents')
    <h1>添加权限</h1>
    @include('layout._errors')
    @include('layout._notice')

    <form method="post" action="{{route('permission.update',[$permission])}}" enctype="multipart/form-data">
        <div class="form-group">
            <label>
                权限名:
                <input type="text" name="describe" class="form-control" style="font-weight:500" value="{{$permission->describe}}"/>
            </label>

        </div>
        <div class="form-group">
            <label>
                权限地址(如：user/index)
                <input type="text" name="name" class="form-control" style="font-weight:500" value="{{$permission->name}}"/>
            </label>
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary" >提交</button>
    </form>
@stop
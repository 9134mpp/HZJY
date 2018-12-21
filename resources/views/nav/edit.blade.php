@extends('layout.default')

@section('contents')
    @include('layout._errors')
    <form method="post" action="{{ route('nav.update',[$nav]) }}" enctype="multipart/form-data">
        <h3><label>修改导航菜单</label></h3>
        <div class="form-group">
            <label>名称</label>
            <input type="text" name="name" class="form-control" placeholder="名称" value="{{ $nav->name }}">
        </div>
        <div class="form-group">
            <label>所属菜单</label>
            <select name="pid" class="form-control">
                <option value="0">顶级分类</option>
                @foreach($navs as $v)
                    <option value="{{ $v->id }}" @if($v->id==$nav->pid) selected @endif>{{ $v->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>URL地址/路由</label>
            <select name="url" class="form-control" name="url">
                <option value="无">请选择URL地址/路由</option>
                @foreach($permissions as $permission)
                    <option value="{{ $permission->name }}" @if($permission->name==$nav->url) selected  @endif>
                        {{ $permission->name }}
                    </option>
                @endforeach
            </select>
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary btn-block">提交</button>
    </form>
@stop
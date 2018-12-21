@extends('layout.default')

@section('contents')
    <h1>添加菜单</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('nav.store')}}">
        <div>
            <div class="form-group">
                <label>菜单名</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label>所属菜单</label>
                <select name="pid" class="form-control">
                    <option value="0">顶级分类</option>
                    @foreach($navs as $nav)
                        <option value="{{ $nav->id }}">{{ $nav->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>URL地址/路由</label>
                <select name="url" class="form-control" name="url">
                    <option value="无">请选择URL地址/路由</option>
                    @foreach($permissions as $permission)
                        <option value="{{ $permission->name }}">
                            {{ $permission->describe.'('.$permission->name.')' }}
                        </option>
                    @endforeach
                </select>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
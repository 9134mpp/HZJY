@extends('layout.default')

@section('contents')
    <h3>导航列表</h3>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>名称</th>
            <th>url地址/路由</th>
            <th>操作</th>
        </tr>
        @foreach ($navs as $nav)
            <tr>
                <td>{{ $nav->id }}</td>
                <td>{{ $nav->name }}</td>
                <td>{{ $nav->url }}</td>
                <td>
                    <a href="{{ route('nav.edit',[$nav]) }}" class="btn btn-warning btn-xs">修改导航菜单</a>
                    <form method="post" action="{{ route('nav.delete',[$nav]) }}" style="display: inline">
                        {{ csrf_field() }}
                        <a href="{{ route('nav.destroy',[$nav]) }}" class="btn btn-danger btn-xs">删除</a>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $navs->links() }}
    <a href="{{ route('nav.create') }}" class="btn btn-success btn-block" role="button" >添加导航菜单</a>
@endsection
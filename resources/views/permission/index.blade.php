@extends('layout.default')
@section('contents')
    <h1>权限列表</h1>
    @include('layout._errors')
    @include('layout._notice')
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>权限名</th>
            <th>权限地址</th>
            <th>操作</th>
        </tr>
        @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->id}}</td>
                <td>{{$permission->describe}}</td>
                <td>{{$permission->name}}</td>
                <td><a href="{{route('permission.edit',[$permission])}}">修改</a>/
                    <a  data-href="{{route('permission.destroy',[$permission])}}" href="javascript:" class="del_btn">删除</a></td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('permission.create') }}" class="btn btn-success btn-block">添加</a>
    <script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script>
        $('.del_btn').click(function () {
            var btn=$(this);
            var url=btn.data('href');
            if(confirm('确定要删除吗？')){
                $.ajax({
                    type:"get",
                    url:url,
                    data:{
                        _token:"{{csrf_token()}}"
                    },
                    success:function(msg){
                        if(msg=='success'){
                            alert('删除成功');
                            //删除当前html
                            btn.closest('tr').fadeOut();
                        }else{
                            alert("删除失败");
                        }

                    }

                });
            }
        });

    </script>
@stop

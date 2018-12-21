@extends('layout.default')

@section('contents')
    <h1>家庭服务分类列表</h1>
    @include('layout._errors')
    @include('layout._notice')
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>分类名</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($fscs as $fsc)
            <tr>
                <td>{{$fsc->id}}</td>
                <td>{{$fsc->name}}</td>
                <td>{{$fsc->status>0?'正常':'异常'}}</td>
                <td><a href="{{route('fsc.edit',[$fsc])}}">修改</a>/
                    <a  data-href="{{route('fsc.destroy',[$fsc])}}" href="#" class="del_btn">删除</a></td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('fsc.create') }}" class="btn btn-success btn-block">添加</a>
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
                            alert('删除失败');
                        }

                    }

                });
            }
        });
    </script>
@stop

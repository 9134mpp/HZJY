@extends('layout.default')
@section('contents')
    <h1>关于我们列表</h1>
    @include('layout._errors')
    @include('layout._notice')

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>所属分类</th>
            <th>内容</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($ismes as $im)
            <tr>
                <td>{{$im->id}}</td>
                <td>{{$im->p->name}}</td>
                <td>{{mb_substr($im->content,0,20).'......'}}</td>
                <td>{{$im->status?'正常':'异常'}}</td>
                <td><a href="{{route('im.edit',[$im])}}">修改</a>/
                    <a  data-href="{{route('im.destroy',[$im])}}" href="javascript:" class="del_btn" >删除</a>
                </td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('im.create') }}" class="btn btn-success btn-block">添加</a>
    {{$ismes->links()}}
    <script src="/bootstrap/js/jquery-1.11.2.min.js"></script>
    <script>
        $('.del_btn').click(function () {
            var btn=$(this);
            var url=btn.data('href');
            if(confirm('确定要删除吗？')){
                $.ajax({
                    type:"GET",
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

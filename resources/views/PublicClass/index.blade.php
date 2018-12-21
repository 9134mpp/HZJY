@extends('layout.default')
@section('contents')
    <h1>公开课列表</h1>
    @include('layout._errors')
    @include('layout._notice')

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>标题</th>
            <th>封面</th>
            <th>简介</th>
            <th>教师简介</th>
            <th>状态</th>
            <th>操作</th>
            <th>&nbsp;</th>
        </tr>
        @foreach($publicclasses as $pc)
            <tr>
                <td>{{$pc->id}}</td>
                <td>{{$pc->title}}</td>
                <td>@if($pc->img) <img class="img-circle" width="100px" src="{{$pc->img}}" /> @endif </td>
                <td>{{mb_substr($pc->content,0,20).'......'}}</td>
                <td>{{mb_substr($pc->teacher,0,20).'......'}}</td>
                <td>{{$pc->status?'正常':'异常'}}</td>
                <td><a href="{{route('pc.edit',[$pc])}}">修改</a>/
                    <a  data-href="{{route('pc.destroy',[$pc])}}" href="javascript:" class="del_btn" >删除</a></td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('pc.create') }}" class="btn btn-success btn-block">添加</a>
    {{$publicclasses->links()}}
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

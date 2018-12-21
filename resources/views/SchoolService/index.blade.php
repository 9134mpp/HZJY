@extends('layout.default')
@section('contents')
    <h1>学校服务列表</h1>
    @include('layout._errors')
    @include('layout._notice')
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>所属分类</th>
            <th>标题</th>
            <th>内容</th>
            <th>封面</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach($sses as $ss)
            <tr>
                <td>{{$ss->id}}</td>
                <td>{{$ss->p->name}}</td>
                <td>{{$ss->title}}</td>
                <td>{{$ss->content}}</td>
                <td>@if($ss->img) <img class="img-rounded" width="300px" src="{{
            \Illuminate\Support\Facades\Storage::url($ss->img)
            }}" /> @endif </td>
                <td>{{$ss->status?'正常':'异常'}}</td>
                <td><a href="{{route('ss.edit',[$ss])}}">修改</a>/
                    <a  data-href="{{route('ss.destroy',[$ss])}}" href="javascript:" class="del_btn" >删除</a></td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('ss.create') }}" class="btn btn-success btn-block">添加</a>
    {{$sses->links()}}
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

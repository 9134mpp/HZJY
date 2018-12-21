@extends('layout.default')
@section('contents')
    <h1>家庭服务列表</h1>
    @include('layout._errors')
    @include('layout._notice')

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>所属分类</th>
            <th>标题</th>
            <th>内容</th>
            <th>模式</th>
            <th>状态</th>
            <th>操作</th>
            <th>&nbsp;</th>
        </tr>
        @foreach($fss as $fs)
            <tr>
                <td>{{$fs->id}}</td>
                <td>{{$fs->p->name}}</td>
                <td>{{$fs->title}}</td>
                <td>{{mb_substr($fs->content,0,20).'......'}}</td>
                <td>@if($fs->tagStatus==1)上线 @elseif($fs->tagStatus==2)下线 @elseif($fs->tagStatus==3)上线 下线@endif</td>
                <td>{{$fs->status?'正常':'异常'}}</td>
                <td><a href="{{route('fs.edit',[$fs])}}">修改</a>/
                    <a  data-href="{{route('fs.destroy',[$fs])}}" href="javascript:" class="del_btn" >删除</a></td>
                <td> <a href="{{route('fs.show',[$fs])}}" class="btn btn-default"> 查看详情</a></td>
            </tr>
        @endforeach
    </table>
    <a href="{{ route('fs.create') }}" class="btn btn-success btn-block">添加</a>
    {{$fss->links()}}
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
                        }else if('nologin'){
                            location.href("{{route('user.login')}}");
                        }else{
                            alert('删除失败');
                        }

                    }

                });
            }
        });
    </script>
@stop

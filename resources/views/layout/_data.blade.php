 <div>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>所属分类</th>
                <th>标题</th>
                <th>内容</th>
                <th>模式</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
            @foreach($fss as $fs)
                <tr>
                    <td>{{$fs->id}}</td>
                    <td>{{$fs->p->name}}</td>
                    <td>{{$fs->title}}</td>
                    <td>{{$fs->content}}</td>
                    <td>@if($fs->tagStatus==1)上线 @elseif($fs->tagStatus==2)下线 @elseif($fs->tagStatus==3)上线 下线@endif</td>
                    <td>{{$fs->status}}</td>
                    <td><a href="{{route('fs.edit',[$fs])}}">修改</a>/
                        <a  data-href="{{route('fs.destroy',[$fs])}}" href="javascript:" class="del_btn">删除</a></td>
                </tr>
            @endforeach
        </table>
    </div>

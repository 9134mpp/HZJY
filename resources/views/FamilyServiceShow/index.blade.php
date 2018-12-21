@extends('layout.default')
@section('contents')
    <h1>家庭服务列表</h1>
    @include('layout._errors')
    @include('layout._notice')

    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>所属服务</th>
            <th>孩子姓名</th>
            <th>电话</th>
            <th>备注</th>
            <th>状态</th>
        </tr>
        @foreach($fsses as $fss)
            <tr>
                <td>{{$fss->id}}</td>
                <td>{{$fss->p->title}}</td>
                <td>{{$fss->name}}</td>
                <td>{{$fss->tel}}</td>
                <td>{{$fss->note}}</td>
                <td>{{$fss->status?'正常':'异常'}}</td>
            </tr>
        @endforeach
    </table>
    {{$fsses->links()}}
@stop

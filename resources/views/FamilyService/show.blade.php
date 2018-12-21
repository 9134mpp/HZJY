@extends('layout.default')
@section('contents')
    @include('layout._errors')
    @include('layout._notice')
    <div>
       <img class="img-rounded" width="50%" src="{{$fs->img}}" style="display: block;margin: 0 auto " />
    </div>
    <form action="{{route('fss.store')}}" method="post">
        <input type="hidden" name="fsId" value="{{$fs->id}}">
        <div class="form-group">
            <label>孩子姓名</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>手机</label>
            <input type="text" name="tel" class="form-control">
        </div>
        <div class="form-group">
            <label>备注</label>
            <input type="text" name="note" class="form-control">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary btn-block">提交</button>
    </form>
@stop

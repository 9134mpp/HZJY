@extends('layout.default')

@section('contents')
    <h1>修改分类</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('prc.update',compact('prc'))}}">
        <div>

            <div class="form-group">
                <label>分类名</label>
                <input type="text" name="title" class="form-control" value="{{$prc->title}}">
            </div>
            <div class="form-group">
                <label>状态</label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio1" value="1" @if($prc->status>0)checked="checked" @endif> 正常
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio2" value="0" @if($prc->status==0)checked="checked" @endif> 异常
                </label>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
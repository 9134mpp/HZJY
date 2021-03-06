@extends('layout.default')

@section('contents')
    <h1>修改学校服务</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('ss.update',[$ss])}}" enctype="multipart/form-data">
        <div>
            <div class="form-group">
                <label>所属分类</label>
                <select class="form-control" name="sscId"  >
                    @foreach($ssces as $ssc)
                        <option value="{{ $ssc->id }}"
                                @if( $ssc->ssc_id==$ssc->id )
                                selected="selected"
                                @endif
                        >{{ $ssc->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>名称</label>
                <input type="text" name="title" class="form-control" value="{{$ss->title}}">
            </div>
            <div class="form-group">
                <label>内容描述</label>
                <textarea class="form-control" rows="3" name="contents" placeholder="请输入内容" >{{$ss->content}}</textarea>
            </div>
            <div class="form-group">
                <label>封面</label>
                <input type="file" name="cover" value="{{ old('file') }}"  class="form-control">
            </div>
            <div class="form-group">
                <label>状态</label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio1" value="1" @if($ss->status>0)checked="checked" @endif> 正常
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio2" value="0" @if($ss->status==0)checked="checked" @endif> 异常
                </label>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
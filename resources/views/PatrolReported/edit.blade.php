@extends('layout.default')

@section('contents')
    <h1>修改巡讲与媒体</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('pr.update',[$pr])}}">
        <div>
            <div class="form-group">
                <label>所属分类</label>
                <select class="form-control" name="prcId" >
                    @foreach($prcs as $prc)
                        <option value="{{ $prc->id }}"
                                @if( $pr->prc_id==$prc->id )
                                selected="selected"
                                @endif
                        >{{ $prc->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>标题</label>
                <input type="text" name="title" class="form-control" value="{{$pr->title}}">
            </div>
            <div class="form-group">
                <label>内容描述</label>
                <textarea class="form-control" rows="3" name="contents" placeholder="请输入内容" >{{$pr->content}}</textarea>
            </div>

            <div class="form-group">
                <label>状态</label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio1" value="1" @if($pr->status>0)checked="checked" @endif> 正常
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio2" value="0" @if($pr->status==0)checked="checked" @endif> 异常
                </label>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
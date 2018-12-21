@extends('layout.default')

@section('contents')
    <h1>修改关于我们</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('im.update',[$im])}}">
        <div>
            <div class="form-group">
                <label>所属分类</label>
                <select class="form-control" name="imcId" >
                    @foreach($imcs as $imc)
                        <option value="{{ $imc->id }}"
                                @if( $im->imc_id==$imc->id )
                                selected="selected"
                                @endif
                        >{{ $imc->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>内容描述</label>
                <textarea class="form-control" rows="3" name="contents" placeholder="请输入内容" >{{$im->content}}</textarea>
            </div>
            <div class="form-group">
                <label>状态</label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio1" value="1" @if($im->status>0)checked="checked" @endif> 正常
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio2" value="0" @if($im->status==0)checked="checked" @endif> 异常
                </label>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
@extends('layout.default')

@section('contents')
    <h1>添加巡演与报道</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('pr.store')}}">
        <div>
            <div class="form-group">
                <label>所属分类</label>
                <select class="form-control" name="PrcId">
                    <option value=""
                    >请选择</option>
                    @foreach($prces as $prc)
                        <option value="{{ $prc->id }}"
                        >{{ $prc->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>名称</label>
                <input type="text" name="title" class="form-control" value="{{old('title')}}">
            </div>
            <div class="form-group">
                <label>内容描述</label>
                <textarea class="form-control" rows="3" name="contents" placeholder="请输入内容">{{old('contents')}}</textarea>
            </div>
            <div class="form-group">
                <label>发布日期</label>
                <input type="date" name="date" class="form-control">
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
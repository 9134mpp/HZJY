@extends('layout.default')

@section('contents')
    <h1>添加家庭服务</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('ss.store')}}" enctype="multipart/form-data">
        <div>
            <div class="form-group">
                <label>所属分类</label>
                <select class="form-control" name="sscId">
                    <option value=""
                    >请选择</option>
                    @foreach($sscs as $ssc)
                        <option value="{{ $ssc->id }}"
                        >{{ $ssc->name}}</option>
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
                <label for="exampleInputFile" >封面</label>
                <input type="file" id="exampleInputFile" name="cover" value="{{ old('cover') }}">
                <p class="help-block">上传所需的封面图片.</p>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
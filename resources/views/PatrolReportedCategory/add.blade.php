@extends('layout.default')

@section('contents')
    <h1>添加巡讲与报道分类</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('prc.store')}}">
        <div>
            <div class="form-group">
                <label>分类名</label>
                <input type="text" name="title" class="form-control" value="{{old('name')}}">
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
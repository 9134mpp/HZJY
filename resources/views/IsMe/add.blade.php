@extends('layout.default')

@section('contents')
    <h1>添加关于我们</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('im.store')}}">
        <div>
            <div class="form-group">
                <label>所属分类</label>
                <select class="form-control" name="imcId">
                    <option value=""
                    >请选择</option>
                    @foreach($imcs as $imc)
                        <option value="{{ $imc->id }}"
                        >{{ $imc->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>内容描述</label>
                <textarea class="form-control" rows="3" name="contents" placeholder="请输入内容"></textarea>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
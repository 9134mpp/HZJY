@extends('layout.default')

@section('contents')
    <h1>添加用户</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('user.store')}}">
        <div>
            <div class="form-group">
                <label>用户名</label>
                <input type="text" name="username" class="form-control" value="{{old('username')}}">
            </div>
            <div class="form-group">
                <label>密码</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>邮箱</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label>手机号</label>
                <input type="text" name="tel" class="form-control" value="{{old('tel')}}">
            </div>
            <div class="form-group">
                <label>所属角色</label>
                <div class="checkbox">
                    @foreach($roles as $role)
                        <label>
                            <input type="checkbox" value="{{$role->id}}" name="role[]">{{$role->name}}
                        </label>
                    @endforeach
                </div>
            </div>
          </div>
        {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button>
    </form>
@stop
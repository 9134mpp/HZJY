@extends('layout.default')

@section('contents')
    <h1>修改用户</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('user.update',compact('user'))}}">

        <div><div class="form-group">
                <label>用户名</label>
                <input type="text" name="username" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label>密码</label>
                <input type="password" name="password" class="form-control" value="{{$user->password}}">
            </div>
            <div class="form-group">
                <label>邮箱</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label>手机号</label>
                <input type="text" name="tel" class="form-control" value="{{$user->tel}}">
            </div>
            <div class="form-group">
                <label>所属角色</label>
                <div class="checkbox">
                    @foreach($roles as $role)
                        <label>
                            <input type="checkbox" value="{{$role->id}}" name="role[]" @if($user->hasRole($role->name)) checked="checked"@endif>{{$role->name}}
                        </label>
                    @endforeach
                </div>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button>
        </div>
    </form>
@stop
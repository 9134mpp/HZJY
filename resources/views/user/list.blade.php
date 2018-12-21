
@extends('layout.default')

@section('contents')
    <h1>登陆</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('user.login')}}">
        <div><div class="form-group">
                <label>用户名</label>
                <input type="text" name="username" class="form-control" value="{{old('username')}}">
            </div>
            <div class="form-group">
                <label>密码</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>验证码</label>
                <input id="captcha" class="form-control" name="captcha">
                <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop
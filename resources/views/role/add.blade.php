@extends('layout.default')

@section('contents')
    <h1>添加角色</h1>
    @include('layout._errors')
    @include('layout._notice')

    <form method="post" action="{{route('role.store')}}" enctype="multipart/form-data">
            <div class="form-group">
                <label>
                    角色名:
                        <input type="text" name="name" class="form-control" style="font-weight:500"/>
                </label>
            </div>
        <div class="form-group">
            <label>所属权限</label>
            <div class="checkbox">
                @foreach($permissions as $permission)
                <label>
                    <input type="checkbox" value="{{$permission->id}}" name="permission[]">{{$permission->describe}}
                </label>
                    @endforeach
            </div>
        </div>
        {{ csrf_field() }}
                <button class="btn btn-primary" >提交</button>
    </form>
    @stop
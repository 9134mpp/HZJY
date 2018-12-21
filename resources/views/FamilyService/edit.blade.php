@extends('layout.default')

@section('contents')
    <h1>修改家庭服务</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('fs.update',[$fs])}}">
        <div>
            <div class="form-group">
                <label>所属分类</label>
                <select class="form-control" name="fscId" >
                    @foreach($fscs as $fsc)
                        <option value="{{ $fsc->id }}"
                                @if( $fs->fsc_id==$fsc->id )
                                selected="selected"
                                @endif
                        >{{ $fsc->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>名称</label>
                <input type="text" name="title" class="form-control" value="{{$fs->title}}">
            </div>
            <div class="form-group">
                <label>内容描述</label>
                <textarea class="form-control" rows="3" name="contents" placeholder="请输入内容" >{{$fs->content}}</textarea>
            </div>
            <div class="form-group">
                <label>图片上传</label>
                <input type="text" name="img" id="img" value="{{$fs->img}}">
                <!--dom结构部分-->
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker">选择图片</div>
                </div>
                <img id="webuploadername" width="30%" src="{{$fs->img}}"/>
            </div>
            <div class="form-group">
                <label>线上/线下</label>
                <div>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="1" name="tagStatus[]" @if($fs->tagStatus&1)checked="checked"@endif> 线上
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox1" value="2" name="tagStatus[]"@if($fs->tagStatus&2)checked="checked"@endif> 线下
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>状态</label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio1" value="1" @if($fs->status>0)checked="checked" @endif> 正常
                </label>
                <label class="radio-inline">
                    <input type="radio" name="status" id="inlineRadio2" value="0" @if($fs->status==0)checked="checked" @endif> 异常
                </label>
            </div>
            {{ csrf_field() }}
            <button class="btn btn-primary btn-block">提交</button></div>
    </form>
@stop

@section('javascript')
    <script>
        // 初始化Web Uploader
        var uploader = WebUploader.create({

            // 选完文件后，是否自动上传。
            auto: true,

            // swf文件路径
            //swf: BASE_URL + '/js/Uploader.swf',

            // 文件接收服务端。
            server: '{{route('web.create')}}',

            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },

            formData:{
                _token:"{{csrf_token()}}"
            }
        });

        uploader.on( 'uploadSuccess', function(file,response) {
           // console.log(response.path);
            //将上传成功的图片显示
            $('#webuploadername').attr('src',response.path);
            //图片地址写入图片框
            $('#img').val(response.path);

        })


    </script>

@stop
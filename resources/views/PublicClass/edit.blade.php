@extends('layout.default')

@section('contents')
    <h1>修改公开课</h1>
    @include('layout._errors')
    @include('layout._notice')
    <form method="post" action="{{route('pc.update',[$pc])}} " enctype="multipart/form-data">
        <div>
            <div class="form-group">
                <label>名称</label>
                <input type="text" name="title" class="form-control" value="{{$pc->title}}">
            </div>
            <div class="form-group">
                <label>内容描述</label>
                <textarea class="form-control" rows="3" name="contents" placeholder="请输入内容">{{$pc->content}}</textarea>
            </div>
            <div class="form-group">
                <label>教师简介</label>
                <textarea class="form-control" rows="3" name="teacher" placeholder="请输入内容">{{$pc->teacher}}</textarea>
            </div>
            <div class="form-group">
                <label>图片上传</label>
                <input type="hidden" name="img" id="img"  value="{{$pc->img}}" />
                <!--dom结构部分-->
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker">选择图片</div>
                </div>
                <img id="webuploadername" width="10%" src="{{$pc->img}}"/>
            </div>
            <div id="uploadfile">
                <label>视频上传</label>
                <div id="picker" >选择文件</div>
                <input type="hidden" name="video" id="video" value="{{$pc->video}}">
                <!--用来存放文件信息-->
                <div id="thelist" class="uploader-list">
                    <table class="table" border="1" cellpadding="0" cellspacing="0" width="100%">
                        <tr class="filelist-head">
                            <th width="5%" class="file-num">序号</th>
                            <th class="file-name">视频名称</th>
                            <th class="file-size">大小</th>
                            <th width="20%" class="file-pro">进度</th>
                            <th class="file-status">状态</th>
                            <th width="20%" class="file-manage">操作</th>
                        </tr>
                    </table>
                </div>
                <div id="ctlBtn" class="btn btn-default">开始上传</div>
                <div>
                    <video src="{{$pc->video}}" controls="controls"></video>
                </div>
                <div class="form-group">
                    <label>状态</label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="inlineRadio1" value="1" @if($pc->status>0)checked="checked" @endif> 正常
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="status" id="inlineRadio2" value="0" @if($pc->status==0)checked="checked" @endif> 异常
                    </label>
                </div>
                {{ csrf_field() }}
                <button class="btn btn-primary btn-block">提交</button>
            </div>
@stop
@section('javascript')
    <script>
        // 初始化Web Uploader
        var uploaderImg = WebUploader.create({

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
                mimeTypes: 'image/*',
            },

            formData:{
                _token:"{{csrf_token()}}"
            }
        });

        uploaderImg.on( 'uploadSuccess', function(file,response) {
            //console.log(response.path);
            //将上传成功的图片显示
            $('#webuploadername').attr('src',response.path);
            //图片地址写入图片框
            $('#img').val(response.path);

        });
        //视频上传
        $(function(){
            //视频上传 start
            var $list = $('#thelist .table'),
                $btn = $('#ctlBtn');

            var uploader = WebUploader.create({
                resize: false, // 不压缩image
                //swf: '../js/uploader.swf', // swf文件路径
                server: "{{route('web.video')}}", // 文件接收服务端。
                pick: '#picker', // 选择文件的按钮。可选
                chunked: true, //是否要分片处理大文件上传
                chunkSize:2*1024*1024, //分片上传，每片2M，默认是5M
                // auto: true, //选择文件后是否自动上传
                // chunkRetry : 2, //如果某个分片由于网络问题出错，允许自动重传次数
                //runtimeOrder: 'html5,flash',
                //accept: {
                    // title: 'Images',
                    //   extensions: 'gif,jpg,jpeg,bmp,png',
                    //   mimeTypes: 'image/*'

                    //
                //},
                fileNumLimit:1,
                duplicate: false ,//是否支持重复上传
                formData:{
                    _token:"{{csrf_token()}}"
                }

            });
            // 当有文件被添加进队列的时候
            uploader.on( 'fileQueued', function( file ) {

                $list.append('<tr id="'+ file.id +'" class="file-item">'+'<td width="5%" class="file-num">111</td>'+'<td class="file-name">'+ file.name +'</td>'+ '<td width="20%" class="file-size">'+ (file.size/1024/1024).toFixed(1)+'M' +'</td>' +'<td width="20%" class="file-pro">0%</td>'+'<td class="file-status">等待上传</td>'+'<td width="20%" class="file-manage"><a class="stop-btn" href="javascript:;">暂停</a><a class="remove-this" href="javascript:;">取消</a></td>'+'</tr>');

                //暂停上传的文件
                $list.on('click','.stop-btn',function(){
                    uploader.stop(true);
                });
                //删除上传的文件
                $list.on('click','.remove-this',function(){
                    if ($(this).parents(".file-item").attr('id') == file.id) {
                        uploader.removeFile(file);
                        $(this).parents(".file-item").remove();
                    }
                })
            });


            //重复添加文件
            var timer1;
            uploader.onError = function(code){
                clearTimeout(timer1);
                timer1 = setTimeout(function(){
                    layer.msg('该文件已存在');
                },250);
            };

            // 文件上传过程中创建进度条实时显示
            uploader.on( 'uploadProgress', function( file, percentage ) {
                $("td.file-pro").text("");
                var $li = $( '#'+file.id ).find('.file-pro'),
                    $percent = $li.find('.file-progress .progress-bar');

                // 避免重复创建
                if ( !$percent.length ) {
                    $percent = $('<div class="file-progress progress-striped active">' +
                        '<div class="progress-bar" role="progressbar" style="width: 0%">' +
                        '</div>' +
                        '</div>' + '<br/><div class="per">0%</div>').appendTo( $li ).find('.progress-bar');
                }

                $li.siblings('.file-status').text('上传中');
                $li.find('.per').text((percentage * 100).toFixed(2) + '%');

                $percent.css( 'width', percentage * 100 + '%' );
            });
            // 文件上传成功
            uploader.on( 'uploadSuccess', function( file ,response) {
                //console.log(response.video);
                //将上传成功的视频显示
                //$('#webuploadername').attr('src',response.path);
                //将视频地址写入视频框
                $('#video').val(response.video);
                $( '#'+file.id ).find('.file-status').text('已上传');
            });

            // 文件上传失败，显示上传出错
            uploader.on( 'uploadError', function( file ) {
                $( '#'+file.id ).find('.file-status').text('上传出错');
            });
            // 完成上传完后将视频添加到视频列表，显示状态为：转码中
            uploader.on( 'uploadComplete', function( file ) {
                // $( '#'+file.id ).find('.file-progress').fadeOut();
            });

            $btn.on('click', function () {
                if ($(this).hasClass('disabled')) {
                    return false;
                }
                uploader.upload();
            });
        });
    </script>
@stop
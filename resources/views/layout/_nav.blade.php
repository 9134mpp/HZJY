<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header">
                <a href="#" class="navbar-left">
                    <img src="/logo/logo.png" width="30px">
                </a>
            </div>
            <a class="navbar-brand" href="#">慧智家庭教育</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                 <li class="active">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理员管理 <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="{{route('user.index')}}">管理员列表</a></li>
                         <li><a href="{{route('user.create')}}">添加管理员</a></li>
                     </ul>

                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">巡演与报道管理 <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="{{route('prc.index')}}">巡演与报道分类</a></li>
                         <li><a href="{{route('pr.index')}}">巡演与报道</a></li>
                     </ul>
                 </li>
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">家庭服务管理 <span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="{{route('fsc.index')}}">家庭服务分类</a></li>
                         <li><a href="{{route('fs.index')}}">家庭服务</a></li>
                     </ul>
                 </li>
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">学校服务管理<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="{{route('ssc.index')}}">学校服务分类</a></li>
                         <li><a href="{{route('ss.index')}}">学校服务</a></li>
                     </ul>
                 </li>
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于我们管理<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="{{route('imc.index')}}">关于我们分类</a></li>
                         <li><a href="{{route('im.index')}}">关于我们</a></li>
                     </ul>
                 </li>
                 <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">公开课管理<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="{{route('pc.index')}}">公开课列表</a></li>
                     </ul>
                 </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">权限管理<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('role.index')}}">角色列表</a></li>
                        <li><a href="{{route('permission.index')}}">权限列表</a></li>
                    </ul>
                </li>
               {{-- {!! \App\Nav::getNav() !!}--}}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @guest
                <li><a href="{{route('user.show',1)}}">登陆</a></li>
                <li><a href="">慧智家庭教育</a></li>
                @endguest
                @auth
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <span class="glyphicon glyphicon-user"></span>{{auth()->user()->name}} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">个人中心</a></li>
                                <li><a href="#">修改密码</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{route('logout')}}">退出登陆</a></li>
                            </ul>
                        </li>
                    @endauth
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


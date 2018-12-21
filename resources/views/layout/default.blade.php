@include('layout._head')
@include('layout._nav')
<body>
<div class="container">
        @yield('contents')
</div>
@yield('javascript')
</body>
@include('layout._foot')

<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <title></title>
    {{-- icon --}}
    <link rel="Shortcut Icon" type="image/x-icon" href="/favicon.ico" />
    {{-- mete區 --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- 引入Styles --}}
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    {{-- Material Design fonts --}}

    @yield('css')

</head>
<body >

    @include('layout.navbar')

    <main>
      <div class="col-sm-2">
        <ul class="list-group">
          @if(Auth::user()->id == 1)<li class="list-group-item list-group-item-success"><a href="{{ url('category' )}}" style="color:gray">種類管理</a> </li>@endif
          <li class="list-group-item list-group-item-warning"><a href="{{ url('admin/issue' )}}" style="color:gray">文章管理</a> </li>
          @if(Auth::user()->id == 1)<li class="list-group-item list-group-item-success"><a href="{{ url('admin/management' )}}" style="color:gray">會員權限管理</a> </li>@endif
          <li class="list-group-item list-group-item-warning"><a href="{{ url('admin/user' )}}" style="color:gray">個人檔案管理</a> </li>
        </ul>
      </div>
      <div class="col-sm-10">
        @yield('admincontent')

      </div>

    </main>



    {{-- JavaScripts --}}
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/scripts.js"></script>

    @yield('js')
</body>
</html>

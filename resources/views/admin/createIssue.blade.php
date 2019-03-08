<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <title></title>
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
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="{{asset('/ckeditor/ckeditor/ckeditor.js')}}"></script>
    {{-- Material Design fonts --}}
</head>
<body >

    @include('layout.navbar')

    <main>
      <div class="col-sm-2">
        <ul class="list-group">
          @if(Auth::user()->id == 1)<li class="list-group-item list-group-item-success"><a href="{{ url('category' )}}" style="color:gray">種類管理</a> </li>@endif
          <li class="list-group-item list-group-item-warning"><a href="{{ url('admin/issue' )}}" style="color:gray">文章管理</a> </li>
          @if(Auth::user()->id == 1)<li class="list-group-item list-group-item-success"><a href="{{ url('admin/management' )}}" style="color:gray">會員權限管理</a> </li>@endif
          <!-- <li class="list-group-item list-group-item-warning"><a href="#" style="color:gray">會員管理</a> </li> -->
        </ul>
      </div>
      <div class="col-sm-10">
        <div class="panel panel-default">
          <div class="panel-heading"><center><strong>新增文章</strong></center></div>
            <div class="panel-body">
              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form class="" action="{{ url('admin/issue') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="usr">文章種類:</label>
                  <div class="selectContainer">
                    <select name="categoryId" class="form-control" value="{{ old('categoryId') }}">

                        <option value="">請選擇文章種類</option>
                        @foreach($userAuthority as $authory)
                          @if($authory->userId == Auth::user()->id)
                            @foreach($category as $categorys)
                              @if($categorys->id == $authory->categoryId )
                                <option value="{{$categorys->id}}" @if(count($errors) > 0)@if($categorys->id== old('categoryId')) selected="selected" @endif @endif>{{$categorys->name}}</option>
                             @endif
                           @endforeach
                         @endif
                        @endforeach
                    </select>
                  </div>


                </div>
                <div class="form-group">
                  <label for="usr">文章名稱:</label>
                  <input type="text" class="form-control" id="usr" name="name" value="{{ old('name') }}">
                </div>
                <label for="usr">文章內容:</label>
                <div class="form-group">
                  <textarea id="ckeditor" class="ckeditor" name="content">{{ old('content') }}</textarea>
                  <script type="text/javascript">

                    CKEDITOR.replace( 'ckeditor' );

                  </script>

              </div>
                <button type="submit" class="btn btn-primary btn-sm">確認送出</button>
              </form>
            </div>
          </div>
        </div>

      </div>



    </main>

</body>
</html>

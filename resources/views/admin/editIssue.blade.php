@extends('admin.layout')
@section('css')
  <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.3/summernote.js"></script>
@stop
@section('admincontent')
<div class="panel panel-default">
  <div class="panel-heading"><center><strong>修改-{{$issue->name}}</strong></center></div>
  <div class="panel-body">
    <form class="" action="{{ url('admin/issue/'.$issue->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="form-group">
        <label for="usr">文章種類:</label>
        <div class="selectContainer">
          <select name="categoryId" class="form-control">
              <option value="">請選擇文章種類</option>
              @foreach($category as $category)
                <option value="{{$category->id}}" @if($category->id==$issue->categoryId) selected="selected" @endif>{{$category->name}}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="usr">文章名稱:</label>
        <input type="text" class="form-control" id="usr" name="name" value="{{$issue->name}}">
      </div>
      <label for="usr">文章內容:</label>
      <div class="form-group">
      <textarea class="mustFill summernote" id="leavMsgCont" name="content" >{{$issue->content}}</textarea>
    </div>
      <button type="submit" class="btn btn-primary btn-sm">確認送出</button>
    </form>
  </div>
</div>
<script>
  $('.summernote').summernote({
    height: 300,   //set editable area's height
    codemirror: { // codemirror options
    theme: 'monokai'
    }
  });
</script>
@endsection

@section('js')

@stop

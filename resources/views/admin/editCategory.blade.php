@extends('admin.layout')

@section('admincontent')
<div class="panel panel-default">
  <div class="panel-heading"><center><strong>修改-{{$category->name}}</strong></center></div>
  <div class="panel-body">
    <form class="" action="{{ url('category/'.$category->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="col-sm-1">
            <strong>種類名稱:</strong>
        </div>
        <div class="col-sm-4">
            <input class="form-control input-sm" id="inputlg" type="text" name="name" value="{{$category->name}}">
        </div>
        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary btn-sm">
            確認修改
          </button>
        </div>
    </form><br><br><br>

  </div>
</div>
@endsection

@section('js')

@stop

@extends('admin.layout')

@section('admincontent')
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
      </div>
    @endif
    @if ($messaged = Session::get('successd'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $messaged }}</strong>
      </div>
    @endif
    @if ($error=Session::get('error'))
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $error }}</strong>
      </div>
    @endif
<div class="panel panel-default">
  <div class="panel-heading"><center><strong>{{$user->name}}權限管理</strong></center></div>
  <div class="panel-body">
    <form class="" action="{{ url('admin/management') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <div class="col-sm-1">
              <strong>新增權限:</strong>
          </div>
          <div class="col-sm-8">
            <div class="selectContainer">
              <select name="categoryId" class="form-control">
                  <option value="">請選擇新增權限</option>
                  @foreach($category as $categoryss)
                    <option value="{{$categoryss->id}}">{{$categoryss->name}}</option>
                  @endforeach

              </select>
            </div>
          </div>
          <div class="col-sm-2">
            <input type="hidden" name="userId" value="{{$user->id}}">
            <button type="submit" class="btn btn-primary btn-sm">
              +新增權限
            </button>
          </div>
        </div>
    </form><br><br><br>
    <table class="table">
     <thead style="background-color:#f2f2f2">
       <tr>
         <th>{{$user->name}}目前已有權限</th>
         <th>/&nbsp;</th>
       </tr>
     </thead>
     <tbody>
         @if(isset($userAuthority))
           @foreach($userAuthority as $authority)
            @foreach($category as $categorys)
              @if($categorys->id==$authority->categoryId)
                <tr>
                  <th>{{$categorys->name}}</th>
                  <th><form action="{{ url('admin/management/'.$authority->id) }}" method="POST">
           								{!! csrf_field() !!}
           								{!! method_field('DELETE') !!}
           								<button type="submit" id="delete-$authority-{{ $authority->id }}" class="btn btn-danger btn-sm">
           									<span class="glyphicon glyphicon-trash"></span>取消權限
           								</button>
           			</form></th>
                </tr>
              @endif
            @endforeach
           @endforeach
        @else
        @endif

     </tbody>
  </div>
</div>
@endsection

@section('js')

@stop

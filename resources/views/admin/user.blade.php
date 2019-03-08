@extends('admin.layout')

@section('admincontent')
@if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
  </div>
@endif
<div class="panel panel-default">
  <div class="panel-heading"><center><strong>個人檔案管理</strong></center></div>
  <div class="panel-body">
    <form class="" action="{{ url('admin/user/'.$user->id) }}" method="post">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
        <table class="table">
         <thead>
           <tr>
             <th>帳號&nbsp;:&nbsp;{{$user->name}}</th>
           </tr>
         </thead>
         <tbody>
            <tr>
              <td><strong>處室名稱:</strong><input type="text" class="form-control" name="office" value="{{$user->office}}"></td>
            </tr>
            <tr>
              <td><strong>e-mail:</strong><input type="text" class="form-control" name="email" value="{{$user->email}}"></td>
            </tr>
         </tbody>
       </table>
       <div class="col-sm-2">
         <button type="submit" class="btn btn-primary btn-sm">
           送出更改資料
         </button>
       </div>
     </form>
  </div>
</div>


@endsection

@section('js')

@stop

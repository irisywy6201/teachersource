@extends('admin.layout')

@section('admincontent')
<div class="panel panel-default">
  <div class="panel-heading"><center><strong>會員權限管理</strong></center></div>
  <div class="panel-body">
    <table class="table">
     <thead>
       <tr>
         <th>帳號</th>
         <th>/&nbsp;</th>
       </tr>
     </thead>
     <tbody>
       @foreach($user as $user)
        <tr>
          <td>{{$user->name}}</td>
          <td><a href="{{url('admin/management/'.$user->id.'/edit')}}"><button type="button" class="btn btn-default btn-sm">
            <span class="glyphicon glyphicon-pencil"></span>編輯權限
          </button></a></td>
        </tr>
       @endforeach
     </tbody>
   </table>
  </div>
</div>
@endsection

@section('js')

@stop

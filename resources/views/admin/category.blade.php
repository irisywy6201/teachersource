@extends('admin.layout')
@section('css')
<link href="/css/style.css" rel="stylesheet">
<link href="/css/bootstrap.min.css" rel="stylesheet">
@stop
@section('admincontent')
<div class="panel panel-default">
  <div class="panel-heading"><center><strong>種類管理</strong></center></div>
  <div class="panel-body">
    <form class="" action="{{ url('category') }}" method="post">
        {{ csrf_field() }}
        <div class="col-sm-1">
            <strong>種類名稱:</strong>
        </div>
        <div class="col-sm-4">
            <input class="form-control input-sm" id="inputlg" type="text" name="name">
        </div>
        <div class="col-sm-2">
          <button type="submit" class="btn btn-primary btn-sm">
            +確認新增
          </button>
        </div>
    </form><br><br><br>
<table class="table">
 <thead>
   <tr>
     <th>種類名稱</th>
     <th>/&nbsp;</th>
   </tr>
 </thead>
 <tbody>
   @foreach($category as $category2)
   <tr>
     <td>{{ $category2->name }}</td>
     <td><p>
       <div class="form-group">
					 <div class="col-sm-2">
             <form action="{{ url('category/'.$category2->id.'/edit') }}" method="GET">
      					<button type="submit" id="edit-category-{{ $category2->id }}" class="btn btn-default btn-sm">
      						<span class="glyphicon glyphicon-pencil"></span>修改
      					</button>
      			 </form>
           </div>
          <div class="col-sm-2">
             <form action="{{ url('category/'.$category2->id) }}" method="POST">
      								{!! csrf_field() !!}
      								{!! method_field('DELETE') !!}
      								<button type="submit" id="delete-category-{{ $category2->id }}" class="btn btn-danger btn-sm">
      									<span class="glyphicon glyphicon-trash"></span> 刪除
      								</button>
      			</form>
          </div>
        </div>
      </p></td>

   </tr>
   @endforeach
 </tbody>
</table>

  </div>
</div>
@endsection

@section('js')

@stop

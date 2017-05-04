@extends('admin.layout')
@section('css')
<link href="/css/style.css" rel="stylesheet">
<link href="css/bootstrap.min.css" rel="stylesheet">
@stop
@section('admincontent')

<div class="panel panel-default">
  <div class="panel-heading"><center><strong>文章管理</strong></center></div>
    <div class="panel-body">
      <a href="{{url('admin/issue/create')}}"><button type="button" class="btn btn-primary btn-sm">
        +新增文章
      </button></a>
      <br><br><br>

      <table class="table">
         <thead>
           <tr>
             <th>文章名稱</th>
             <th>/&nbsp;</th>
           </tr>
         </thead>
         <tbody>
           @if(Auth::user()->id == 1)
             @foreach($category as $categorys)
                <tr><td style="background-color:#e6e6e6;font-size:18px">{{$categorys->name}}</td><td style="background-color:#e6e6e6"></td></tr>
                @foreach($issue as $issues)
                  @if($issues->categoryId==$categorys->id)
                   <tr>
                     <td>{{ $issues->name }}</td>
                     <td><p>
                       <div class="form-group">
                					 <div class="col-sm-2">
                             <form action="{{ url('admin/issue/'.$issues->id.'/edit') }}" method="GET">
                      					<button type="submit" id="edit-issue-{{ $issues->id }}" class="btn btn-default btn-sm">
                      						<span class="glyphicon glyphicon-pencil"></span>修改
                      					</button>
                      			 </form>
                           </div>
                          <div class="col-sm-2">
                             <form action="{{ url('admin/issue/'.$issues->id) }}" method="POST">
                      					{!! csrf_field() !!}
                      					{!! method_field('DELETE') !!}
                      					<button type="submit" id="delete-issue-{{ $issues->id }}" class="btn btn-danger btn-sm">
                      						<span class="glyphicon glyphicon-trash"></span> 刪除
                      					</button>
                      			</form>
                          </div>
                        </div>
                      </p></td>
                   </tr>
                   @endif
                @endforeach
              @endforeach
            @else
              @foreach($userAuthority as $authory)
                @if($authory->userId == Auth::user()->id)
                  @foreach($category as $categorys)
                    @if($categorys->id == $authory->categoryId )
                       <tr><td style="background-color:#e6e6e6;font-size:18px">{{$categorys->name}}</td><td style="background-color:#e6e6e6"></td></tr>
                       @foreach($issue as $issues)
                         @if($issues->categoryId==$categorys->id)
                          <tr>
                            <td>{{ $issues->name }}</td>
                            <td><p>
                              <div class="form-group">
                                  <div class="col-sm-2">
                                    <form action="{{ url('admin/issue/'.$issues->id.'/edit') }}" method="GET">
                                       <button type="submit" id="edit-issue-{{ $issues->id }}" class="btn btn-default btn-sm">
                                         <span class="glyphicon glyphicon-pencil"></span>修改
                                       </button>
                                    </form>
                                  </div>
                                 <div class="col-sm-2">
                                    <form action="{{ url('admin/issue/'.$issues->id) }}" method="POST">
                                       {!! csrf_field() !!}
                                       {!! method_field('DELETE') !!}
                                       <button type="submit" id="delete-issue-{{ $issues->id }}" class="btn btn-danger btn-sm">
                                         <span class="glyphicon glyphicon-trash"></span> 刪除
                                       </button>
                                   </form>
                                 </div>
                               </div>
                             </p></td>
                          </tr>
                          @endif
                       @endforeach
                     @endif
                 @endforeach
                @endif
              @endforeach
            @endif

         </tbody>
        </table>

  </div>
</div>

@endsection

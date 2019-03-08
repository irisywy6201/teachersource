@extends('layout.layout')
@section('css')
<style media="screen">
  .jumbotron{
    background-color: #f2f2f2;
  }
</style>
@stop
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-2" >
      <h6>&nbsp;</h6>
      <div class="panel-group">
        <div class="panel panel-default">
          @foreach($category as $categoryss)
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse{{$categoryss->id}}"><h5>{{$categoryss->name}}</h5></a>
              </h4>
            </div>
            <div id="collapse{{$categoryss->id}}" class="panel-collapse collapse @if($categoryss->id == $thisissue->categoryId) in @endif ">
              @foreach($issue as $issues)
                @if($issues->categoryId==$categoryss->id)
                <div class="panel-body"><a href="{{url('issue/'.$issues->id)}}" style="text-decoration:none;"><h6>&nbsp;&nbsp;&nbsp;&nbsp;{{$issues->name}}</h6></a></div>
                @endif
              @endforeach
            </div>
          @endforeach
        </div>
  </div>
    </div>
    <div class="col-sm-10" >
      <h6><span class="glyphicon glyphicon-map-marker"></span>&nbsp;現在位置:@foreach($category as $categorys) @if($categorys->id == $thisissue->categoryId) {{$categorys->name}} @endif @endforeach > {{$thisissue->name}}</h6>

      <div class="jumbotron">
        <h2 style="color:#000;padding:2px;border-left:solid 2px #0099cc;">&nbsp;<strong>{{$thisissue->name}}</strong></h2><hr>
        <p>{!! $thisissue->content !!}</p>
      </div>
    </div>
  </div>

</div>

@endsection

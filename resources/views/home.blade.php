@extends('layout.layout')
@section('css')
  <style media="screen">
    .jumbotron{
      margin-bottom:-10px;
      background-color:#f5f5f0;
    }
  </style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
              <h2 style="font-family:標楷體">
                  國立中央大學&nbsp;教師資源e化平台
              </h2>
          </div>
            <div class="carousel slide" id="carousel-498746">
                <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#carousel-498746">
                    </li>
                    <li data-slide-to="1" data-target="#carousel-498746" class="active">
                    </li>
                    <li data-slide-to="2" data-target="#carousel-498746">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img alt="Carousel Bootstrap First" src="./img/ncuLake.jpg">
                    </div>
                    <div class="item active">
                        <img alt="Carousel Bootstrap Second" src="./img/ncuLake.jpg">
                    </div>
                    <div class="item">
                        <img alt="Carousel Bootstrap Third" src="./img/ncuLake.jpg">
                    </div>
                </div> <a class="left carousel-control" href="#carousel-498746" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-498746" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>


        </div>
    </div><hr>

      <input type="hidden" name="" value="{{$c=1}}">
      @foreach($category as $categorys)
          @if($c==1)
            <div class="row">
          @endif

            <div class="col-md-3">
                <div class="panel-group" id="panel-{{$categorys->id}}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <a class="panel-title" data-toggle="collapse" data-parent="#panel-01" href="#panel-element-{{$categorys->id}}"><span class="glyphicon glyphicon-chevron-down"></span> &nbsp;{{$categorys->name}}&nbsp;</a>
                        </div>
                        <div id="panel-element-{{$categorys->id}}" class="panel-collapse collapse">
                          @foreach($issue as $issues)
                            @if($issues->categoryId==$categorys->id)
                            <div class="panel-body">
                                <a href="{{url('issue/'.$issues->id)}}">{{$issues->name}}</a>
                            </div>
                            @endif
                          @endforeach
                    </div>
                </div>
              </div>
          </div>
          @if($c%4==0)
            </div>
            <div class="row">
          @endif
          <input type="hidden" name="" value="{{$c=$c+1}}">

    @endforeach

</div>
<br><br>
@endsection

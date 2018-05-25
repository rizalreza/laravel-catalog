@extends('layouts.app')


@section('content')
      
       
 <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">Type Detail <a href="/sizes/create" class="btn btn-default btn-xs pull-right"> Add new Size</a></div>
        <div class="panel-body">

          <ul class="list-group">

            <li class="list-group-item"><strong><a style="text-decoration: none;" href="/sizes/{{$size->id}}"> {{$size->size}} </a></strong>
            <p class="pull-right"><strong> Created At  : </strong>{{Carbon\Carbon::parse($size->created_at)->diffForHumans()}} </p><br>   </li>

          </ul>


        </div>
      </div>
    </div>



@endsection
@extends('layouts.app')


@section('content')
      
       
 <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
      <div class="panel panel-primary">
        <div class="panel-heading">Variant Detail <a href="/variants/create" class="btn btn-default btn-xs pull-right"> Add new variant</a></div>
        <div class="panel-body">

          <ul class="list-group">

            <li class="list-group-item"><strong><a style="text-decoration: none;"> {{$variant->name}} </a></strong>
            <p class="pull-right"><strong> Created At  : </strong>{{Carbon\Carbon::parse($variant->created_at)->diffForHumans()}} </p><br>   </li>

           <li class="list-group-item">
            <strong><a style="text-decoration: none; color: grey;">
            @if(empty($variant->size->size))
             Size &nbsp; : &nbsp;No Data <br>
            @else
              Size &nbsp; : &nbsp;{{ $variant->size->size }} <br>
            @endif
            @if(empty($variant->type->type))
             Type &nbsp; : &nbsp;No Data <br>
            @else
              Type &nbsp; : &nbsp;{{ $variant->type->type }} <br>
            @endif
              Currency &nbsp; : &nbsp;{{ $variant->currency->currency }} <br>
              Price &nbsp; : &nbsp;{{ $variant->price }} <br>
              Discount &nbsp; : &nbsp;{{ $variant->discount }} <br>
              Nett Price &nbsp; : &nbsp;{{ $variant->nett_price }} <br>
              Stock &nbsp; : &nbsp;{{ $variant->stock }} <br>
            </a></strong>

            </li>

          </ul>


        </div>
      </div>
    </div>



@endsection
@extends('layouts.app')


@section('content')

<center><h2>Edit Type</h2></center>

    <div class="col-md-8 col-lg-8 col-sm-8 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
        <form method="post" action="{{route('types.update',[$type->id])}}">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="put">

              <div class="form-group">
                <label for="type">Type<span class="required">*</span></label>
                <input placeholder="Input type" id="type" name="type" spellcheck="false" class="form-control" value=" {{$type->type}}" required autofocus>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
        </form>    
    </div>




@endsection
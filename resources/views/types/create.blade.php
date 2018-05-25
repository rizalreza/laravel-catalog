@extends('layouts.app')


@section('content')

<center><h2>Create Type</h2></center>

    <div class="col-md-6 col-lg-6 col-sm-6 col-md-offset-3 col-lg-offset-3 col-sm-offset-3">
        <form method="post" action="{{route('types.store')}}">
              {{csrf_field()}}
               <input type="hidden" name="_method" value="post"> 

              <div class="form-group">
                <label for="type-name">Type<span class="required">*</span></label>
                <input placeholder="Input type" id="type" name="type" spellcheck="false" class="form-control" value="" required autofocus>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
        </form>    
    </div>


@endsection
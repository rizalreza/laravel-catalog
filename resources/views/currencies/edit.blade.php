@extends('layouts.app')


@section('content')

<center><h2>Edit Currency</h2></center>

    <div class="col-md-8 col-lg-8 col-sm-8 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
        <form method="post" action="{{route('currencies.update',[$currency->id])}}">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="put">

              <div class="form-group">
                <label for="currency">Currency<span class="required">*</span></label>
                <input placeholder="Input currency" id="currency" name="currency" spellcheck="false" class="form-control" value=" {{$currency->currency}}" required autofocus>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
        </form>    
    </div>




@endsection
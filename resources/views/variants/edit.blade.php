@extends('layouts.app')


@section('content')

<center><h2>Edit Vaiant</h2></center>

    <div class="col-md-8 col-lg-8 col-sm-8 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
        <form method="post" action="{{route('variants.update',[$variant->id])}}">
              {{csrf_field()}}
        <input type="hidden" name="_method" value="put">

        <div class="form-group">
                <label for="variant-name">Variant Name<span class="required">*</span></label>
                <input placeholder="Input size" id="name" name="name" spellcheck="false" class="form-control" value="{{$variant->name}}" required autofocus>
              </div>

              <div class="form-group">
                <label for="">Type</label>
                <select type="text" class="form-control" name="type_id">
                    <option value="">Select Type</option>
                    @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->type}}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="">Size</label>
                <select type="text" class="form-control" name="size_id">
                    <option value="">Select Size</option>
                    @foreach($sizes as $size)
                    <option value="{{$size->id}}">{{$size->size}}</option>
                    @endforeach
                </select>
              </div>

             <div class="form-group">
                <label for="">Currency</label>
                <select type="text" class="form-control" name="currency_id" required autofocus>
                    <option value="">Select Currency</option>
                    @foreach($currencies as $currency)
                    <option value="{{$type->id}}">{{$currency->currency}}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="price">Price<span class="required">*</span></label>
                <input placeholder="Input price" id="price" name="price" spellcheck="false" class="form-control" value="{{$variant->price}}" required autofocus>
              </div>

              <div class="form-group">
                <label for="discount">Discount<span class="required">*</span></label>
                <input placeholder="Input size" id="discount" name="discount" spellcheck="false" class="form-control" value="{{$variant->discount}}">
              </div>

              <div class="form-group">
                <label for="stock">Stock<span class="required">*</span></label>
                <input placeholder="Input stock" id="stock" name="stock" spellcheck="false" class="form-control" value="{{$variant->stock}}" required autofocus>
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>



        </form>    
    </div>




@endsection
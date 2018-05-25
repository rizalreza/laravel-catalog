@extends('layouts.app')


@section('content')

<center><h2>Edit Product</h2></center>

    <div class="col-md-6 col-lg-6 col-sm-6 col-md-offset-3 col-lg-offset-3 col-sm-offset-3">
        <form method="post" action="{{route('products.update',[$product->id])}}">
              {{csrf_field()}}
               <input type="hidden" name="_method" value="put"> 

              <div class="form-group">
                <label for="product-name">Product Name<span class="required">*</span></label>
                <input placeholder="Input product name" id="product_name" name="product_name" spellcheck="false" class="form-control" value="{{$product->product_name}}" required autofocus>
              </div>

              <div class="form-group">
                <label for="product-desc">Product Description<span class="required">*</span></label>
                <textarea id="product_desc" name="product_desc" class="ckeditor">                {{$product->product_desc}}</textarea>  
              </div>


             <div class="form-group">
                <label for="">Variant</label>
                <select type="text" class="form-control" name="variant_id" required autofocus>
                    <option value="">Select Variant</option>
                    @foreach($variants as $variant)
                    <option value="{{$variant->id}}">{{$variant->name}}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="production-date">Production Date</label>
                <input type="text" id="production_date" name="production_date" class="form-control" value="{{$product->production_date}}" style="width: 200px">
              </div>

              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
              </div>
        </form>    
    </div>


 
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"></script>

<script>
    $(function() {
    $( "#production_date" ).datepicker({ dateFormat: 'yy-mm-dd',
                                    changeMonth: true,
                                    changeYear: true});
                                    });
</script>

<script src="{{url('ckeditor/ckeditor.js')}}"></script>
<script>
    var ckview = document.getElementById("ckview");
    CKEDITOR.replace(ckview,{
      language:'en-gb'
    });
  </script>


@endsection
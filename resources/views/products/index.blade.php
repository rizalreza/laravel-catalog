@extends('layouts.app')

@section('content')



<center><h2>Variant Index</h2></center>




    <div class="col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1">
      <div class="pull-right">
        <a href="{{ route('products.create')}}" class="btn btn-xs btn-info">Add new product</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>

            <th>Product Name</th>
            <th>Variant</th>
            <th>Production Date</th>
            <th><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>

            <td width="200">{{ $product->product_name }}</td>          
            <td width="150">{{ $product->variant->name }}</td>
            <td width="150">{{ $product->production_date }}</td>

            <td width="400"><center><a href="/products/{{$product->id}}" class="btn btn-xs btn-success">View</a>
            <a href="/products/{{$product->id}}/edit" class="btn btn-xs btn-primary">Edit</a>

            <form id="deleteProduct-form" action="#" method="POST" style="display: none;">
              <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
                <a href="#" class="btn btn-xs btn-danger" 
                  onclick="
                          var result = confirm('Are you sure want to delete this product?');
                            if (result) {
                                  event.preventDefault();
                                  document.getElementById('delete-form').submit();
                            }
                            ">
                          Delete
                      </a>
            <form id="delete-form" action="{{ route('products.destroy', [$product->id]) }}" method="POST" style="display: none;">
            <input type="hidden" name="_method" value="delete">
                          {{csrf_field()}}
            </form>

          </center></td>
          </tr>
          @endforeach
        </tbody>
      </table>
     <center> {{$products->links()}}</center>
    </div>


@endsection

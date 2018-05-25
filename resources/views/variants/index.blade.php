@extends('layouts.app')

@section('content')



<center><h2>Variant Index</h2></center>




    <div class="col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1">
      <div class="pull-right">
        <a href="{{ route('variants.create')}}" class="btn btn-xs btn-info">Add new variant</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>

            <th>Variant Name</th>
            <th>Type</th>
            <th>Size</th>
            <th>Currency</th>
            <th>Nett Price</th>
            <th>Stock</th>
            <th><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          @foreach($variants as $variant)
          <tr>

            <td width="200">{{ $variant->name }}</td>
         @if(empty($variant->type->type))
            <td width="150">No Data</td>
         @else
            <td width="150">{{ $variant->type->type }}</td>
         @endif
         @if(empty($variant->size->size ))
            <td width="150">No Data</td>
         @else            
            <td width="150">{{ $variant->Size->size }}</td>
         @endif
            <td width="150">{{ $variant->currency->currency }}</td>
            <td width="150">{{ $variant->nett_price }}</td>
            <td width="150">{{ $variant->stock }}</td>
            <td width="400"><center><a href="/variants/{{$variant->id}}" class="btn btn-xs btn-success">View</a>
            <a href="/variants/{{$variant->id}}/edit" class="btn btn-xs btn-primary">Edit</a>

            <form id="deleteSize-form" action="#" method="POST" style="display: none;">
              <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
                <a href="#" class="btn btn-xs btn-danger" 
                  onclick="
                          var result = confirm('Are you sure want to delete this size?');
                            if (result) {
                                  event.preventDefault();
                                  document.getElementById('delete-form').submit();
                            }
                            ">
                          Delete
                      </a>
            <form id="delete-form" action="{{ route('variants.destroy', [$variant->id]) }}" method="POST" style="display: none;">
            <input type="hidden" name="_method" value="delete">
                          {{csrf_field()}}
            </form>

          </center></td>
          </tr>
          @endforeach
        </tbody>
      </table>
     <center> {{$variants->links()}}</center>
    </div>


@endsection

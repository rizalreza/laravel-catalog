@extends('layouts.app')

@section('content')



<center><h2>Size Index</h2></center>




    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
      <div class="pull-right">
        <a href="{{ route('sizes.create')}}" class="btn btn-xs btn-info">Add new size</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Size Name</th>
            <th><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          @foreach($sizes as $size)
          <tr>
            <td> {{ $size->id }} </td>
            <td width="200">{{ $size->size }}</td>
            <td><center><a href="/sizes/{{$size->id}}" class="btn btn-xs btn-success">View</a>
            <a href="/sizes/{{$size->id}}/edit" class="btn btn-xs btn-primary">Edit</a>

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
            <form id="delete-form" action="{{ route('sizes.destroy', [$size->id]) }}" method="POST" style="display: none;">
            <input type="hidden" name="_method" value="delete">
                          {{csrf_field()}}
            </form>

          </center></td>
          </tr>
          @endforeach
        </tbody>
      </table>
     <center> {{$sizes->links()}}</center>
    </div>


@endsection

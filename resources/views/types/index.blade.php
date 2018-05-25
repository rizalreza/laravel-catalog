@extends('layouts.app')

@section('content')



<center><h2>Type Index</h2></center>




    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
      <div class="pull-right">
        <a href="{{ route('types.create')}}" class="btn btn-xs btn-info">Add new type</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Type Name</th>
            <th><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          @foreach($types as $type)
          <tr>
            <td> {{ $type->id }} </td>
            <td width="200">{{ $type->type }}</td>
            <td><center><a href="/types/{{$type->id}}" class="btn btn-xs btn-success">View</a>
            <a href="/types/{{$type->id}}/edit" class="btn btn-xs btn-primary">Edit</a>

            <form id="deleteType-form" action="#" method="POST" style="display: none;">
              <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
                <a href="#" class="btn btn-xs btn-danger" 
                  onclick="
                          var result = confirm('Are you sure want to delete this type?');
                            if (result) {
                                  event.preventDefault();
                                  document.getElementById('delete-form').submit();
                            }
                            ">
                          Delete
                      </a>
            <form id="delete-form" action="{{ route('types.destroy', [$type->id]) }}" method="POST" style="display: none;">
            <input type="hidden" name="_method" value="delete">
                          {{csrf_field()}}
            </form>

          </center></td>
          </tr>
          @endforeach
        </tbody>
      </table>
     <center> {{$types->links()}}</center>
    </div>


@endsection

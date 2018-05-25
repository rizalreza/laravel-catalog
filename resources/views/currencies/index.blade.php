@extends('layouts.app')

@section('content')



<center><h2>Currency Index</h2></center>




    <div class="col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
      <div class="pull-right">
        <a href="{{ route('currencies.create')}}" class="btn btn-xs btn-info">Add new currency</a>
      </div>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Currency Name</th>
            <th><center>Action</center></th>
          </tr>
        </thead>
        <tbody>
          @foreach($currencies as $currency)
          <tr>
            <td> {{ $currency->id }} </td>
            <td width="200">{{ $currency->currency }}</td>
            <td><center><a href="/currencies/{{$currency->id}}" class="btn btn-xs btn-success">View</a>
            <a href="/currencies/{{$currency->id}}/edit" class="btn btn-xs btn-primary">Edit</a>

            <form id="deleteCurrency-form" action="#" method="POST" style="display: none;">
              <input type="hidden" name="_method" value="DELETE">
                {{csrf_field()}}
            </form>
                <a href="#" class="btn btn-xs btn-danger" 
                  onclick="
                          var result = confirm('Are you sure want to delete this currency?');
                            if (result) {
                                  event.preventDefault();
                                  document.getElementById('delete-form').submit();
                            }
                            ">
                          Delete
                      </a>
            <form id="delete-form" action="{{ route('currencies.destroy', [$currency->id]) }}" method="POST" style="display: none;">
            <input type="hidden" name="_method" value="delete">
                          {{csrf_field()}}
            </form>

          </center></td>
          </tr>
          @endforeach
        </tbody>
      </table>
     <center> {{$currencies->links()}}</center>
    </div>


@endsection

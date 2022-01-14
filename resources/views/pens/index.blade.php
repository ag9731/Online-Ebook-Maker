@extends('pens.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of reviewer </h2>
            </div>
           <!-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pens.create') }}"> Create New Product</a>
            </div>-->
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($pens as $pen)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pen->name }}</td>
            <td>{{ $pen->detail }}</td>
            <td>
                <form action="{{ route('pens.destroy',$pen->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('pens.show',$pen->id) }}">Show</a>
    
                    <!--<a class="btn btn-primary" href="{{ route('pens.edit',$pen->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $pens->links() !!}
      
@endsection
@extends('publications.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List of Publisher</h2>
            </div>
           <!-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('publications.create') }}"> Create New Product</a>
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
        @foreach ($publications as $publication)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $publication->name }}</td>
            <td>{{ $publication->detail }}</td>
            <td>
                <form action="{{ route('publications.destroy',$publication->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('publications.show',$publication->id) }}">Show</a>
    
                 <!--   <a class="btn btn-primary" href="{{ route('publications.edit',$publication->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>-->
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $publications->links() !!}
      
@endsection
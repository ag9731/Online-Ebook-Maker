@extends('novals.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>REVIEWER LIST</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('novals.create') }}"> Create New Noval</a>
            </div>
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
            <th>Email</th>

            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($novals as $noval)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $noval->name }}</td>
            <td>{{ $noval->email }}</td>

            <td>{{ $noval->detail }}</td>
            

            <td>
                <form action="{{ route('novals.destroy',$noval->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('novals.show',$noval->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('novals.edit',$noval->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $novals->links() !!}
      
@endsection
@extends('products.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CREATE YOUR  BOOK</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Book</a>
                
            </div>
        </div>
    </div>
    
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn btn-primary" data-dismiss=" alert">
                <i class ="fa fa-times"></i>
</button>
<strong>Sucesss !</strong> {{ session('success')}}
            
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>title</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $product->image }}" width="100px"></td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->detail }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $products->links() !!}




    
        
@endsection
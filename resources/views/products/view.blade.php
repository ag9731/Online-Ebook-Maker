@extends('products.layout')
     
@section('content')
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
            
            
            
        
        @foreach ($products as $product)
        
        {{ ++$i }}
            <a  href="{{ route('products.show',$product->id) }}"><img src="/image/{{ $product->image }}" width="200px"></a>

                    @csrf
                    
        
                   
            
        
        @endforeach
    
    
    {!! $products->links() !!}
        
@endsection
@extends('products.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $product->name }}" class="form-control" placeholder="title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                   <!-- <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">-->
                    
                    <textarea name="detail" rows="5" cols="40" class="form-control tinymce-editor">

                    {{ $product->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $product->image }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="https://cdn.tiny.cloud/1/ewshp0b4eptivlf1kad1wosyzeqlzsp7wa2ri75hp67k3pr2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
  
    tinymce.init({
        selector : "textarea",
        height:1000,

        plugins : ["advlist autolink lists link image  charmap print preview anchor image ExportToDoc", "searchreplace visualblocks code fullscreen autosave ", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo  restoredraft ExportToDoc | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        export_cors_hosts: [ 'rvijay12345678910.com', 'otherdomain.com' ]
    });

</script>
</body>
</html>

@endsection

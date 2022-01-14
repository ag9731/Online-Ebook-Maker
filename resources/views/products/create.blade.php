@extends('products.layout')
  
@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New BOOK</h2>
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
     
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <!--<textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>-->
                <textarea name="detail" rows="5" cols="40" class="form-control tinymce-editor"></textarea>
            </div>
        </div>
       <!-- <div class="col-xs-12 col-sm-12 col-md-12">-->
        <div class="alert-success" id="popup_notification">


            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="image">
            </div>
        </div>
       <!-- <div class="col-xs-12 col-sm-12 col-md-12 text-center"> -->
        </div>

        <div class="alert-success" id="popup_notification">
       <!--<button type="submit" class="btn btn-primary ">Submit</button>-->
        <button type="submit" class="btn btn-xs btn-danger btn-flat show_confirm" data-toggle="tooltip" title='Delete'>submit</button>

      <!-- <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="btn btn-primary" data-dismiss=" alert">Submit
                <i class ="fa fa-times"></i>-->
</button>

    </div>
     
</form>

<!--<script>
    $(document).ready(function(){
        $('.sersuccess').click(function(e
        {
            e.preventDefault();
            alert('Book Created Succesfully');
        });
    });
</script>-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="https://cdn.tiny.cloud/1/ewshp0b4eptivlf1kad1wosyzeqlzsp7wa2ri75hp67k3pr2/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
   <script>
       $("#submit").click(function(){
    swal({
        title: "Succesfully Submitted",
        icon: "success",
        button: "ok",
    });
});
       </script>
    <script type="text/javascript">
  
    tinymce.init({
        selector : "textarea",
        height:1000,

        plugins : ["advlist autolink lists link image  charmap print preview anchor image ExportToDoc", "searchreplace visualblocks code fullscreen autosave ", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo  restoredraft ExportToDoc | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
        export_cors_hosts: [ 'rvijay12345678910.com', 'otherdomain.com' ]
    });
    

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  
</script>
</body>
</html>



@endsection
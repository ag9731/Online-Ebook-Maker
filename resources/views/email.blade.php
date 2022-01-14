<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> send mail</title>
</head>
<body>
<form action="{{route('email/send')}}" method="POST" enctype="multipart/form-data">
@csrf






<input type="text" name="nama">
<input type="file" name="image">
<br>
<input type="submit" name="Submit">
</form>
</body>
</html>  




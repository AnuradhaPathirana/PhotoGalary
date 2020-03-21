<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Home</title>
</head>
<body>
    <h2>IMAGE Gallary</h2><br>

    <div class="container">
        

        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
        {{$error}}
        
        </div>

        @endforeach


          <form method="POST" action="/upload" enctype="multipart/form-data">
          {{csrf_field()}}
            <b> Image Tittle :</b><br><input type="text" name="imgtitle" class="form-control" id="validationCustom01" placeholder="Enter Image Name"  required><br>
            

                <div class="form-group">
                   <label for="comment"><b>Discripction:</b><br></label>
                   <textarea class="form-control" name="imagediscription" rows="5" id="comment" placeholder="Something About Your Image"></textarea>
                </div><!-- form-group -->

            <b>Upload Image:</b><br>
            <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="imagefile" id="inputGroupFile04" >
                <label class="custom-file-label" for="inputGroupFile04">Choose Image file (use jpg extention!!)</label>
             </div><!--custom-file -->
            </div><!-- input-group --><br>
          <input type="submit" value="Create Image Document" name="upload">
          </form>
        
<br>
<table class="table table-dark">
 <th>Image Name</th>
 <th>Action</th>
 <!-- <th>Image</th> -->

 @foreach($dataimg as $got)
<tr>
    <td>{{$got->imagename}}</td>
    <td>
        <a class="btn btn-info btn-sm" href="/read/{{$got->id}}"> <i class="glyphicon glyphicon-th-large">View</i></a>
        <a class="btn btn-info btn-sm" href="/update/{{$got->id}}"> <i class="glyphicon glyphicon-th-large">Update</i></a>
        <a class="btn btn-info btn-sm" href="/delete/{{$got->id}}"> <i class="glyphicon glyphicon-th-large">Delete</i></a>
    </td>
</tr>
 @endforeach
 
</table>
<br>
    <div class="text-center">

    </div><!--text-center-->
</div><!--container-->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
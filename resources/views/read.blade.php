<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view table Data</title>
</head>
<body>

@foreach($viewit as $got)

<img src="{{asset('uploads/img/' . $got->image)}}" alt="image" class="img-thumbnail" style="width: 300px;height: 300px;" >
<h3>{{$got->imagename}}</h3>
<u>ABOUT</u><p>{{$got->discription}}</p>

@endforeach

</body>
</html>
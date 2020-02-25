
<head>
  <title>List of all courses</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<header style="text-align: center;color: #2E4053  "><h1>All cources available</h1>

</header>
<table class="table table-striped" style="font-size:10px ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Course</th>
      <th scope="col">Faculty</th>
    </tr>
  </thead>
  <tbody>
   @foreach($courses as $key=>$course)
     <tr>
      <td>{{++$key}}</td>
      <th>{{$course->course}}</th>
      <th>{{$course->faculty}}</th>                            
     </tr>
      @endforeach
  </tbody>
</table>
</body>
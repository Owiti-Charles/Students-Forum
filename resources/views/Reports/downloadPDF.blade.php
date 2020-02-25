<!DOCTYPE html>
<html>
<head>
  <title>students </title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<header style="text-align: center;color: #2E4053  "><h1>All students from the Faculty</h1>

</header>
<table class="table table-striped" style="font-size:8px">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Admin No.</th>
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">Registered</th>
    </tr>
  </thead>
  <tbody>
        @foreach($users as $key=>$user)
            <tr>
            <td>{{++$key}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td class="center"> {{$user->created_at->toDayDateTimeString()}} </td>
            <td>{{$user->gender}}</td>    
            </tr>
                @endforeach
  </tbody>
</table>
</body>

</html>



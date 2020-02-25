<!DOCTYPE html>
<html>
<head>
  <title>Lectures</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<header style="text-align: center;color: #2E4053  "><h1>All lecturers</h1>

</header>
<table class="table table-striped" style="font-size:8px ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Faculty</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Gender</th>
      <th scope="col">Registered</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $key=>$user)
                    <tr >
                        <td>{{++$key}}</td>
                        <td>{{$user->name}}</td>
                        <th >{{$user->faculty->faculty}}</th>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->gender}}</td> 
                        <td class="center"> {{$user->created_at->toDayDateTimeString()}} </td>
                      </tr>
                @endforeach
  </tbody>
</table>
</body>
</html>
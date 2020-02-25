<h1>Users List</h1>
<table>
  <thead>
    <tr>
      <th>ID</th>
                   <th>Name</th>
                    <td>Faculty</td>
                    <td>Course</td>
                    <th >Registered</th>
                    
    </tr>
  </thead>
  <tbody>
    @foreach($data as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{$user->name}}</td>
         <td>{{$user->faculty->faculty}}</td>
         <td>{{$user->course->course}}</td>
         <td>{{$user->created_at->toDateString()}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
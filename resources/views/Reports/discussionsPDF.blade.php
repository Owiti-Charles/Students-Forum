<!DOCTYPE html>
<html>
<head>
    <title>list of all users</title>
    <link rel="stylesheet" type="text/css" href="'css/report.css')">
</head>
<body>
<h1>All posts List</h1>

            
                <table width="100%" border="1px"  >
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Created By</th>
                        <th >Course</th>
                        <th >Title</th>
                        <th >Content</th>
                        <th > Uploaded</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($discussions as $key=>$discussion)
                        <tr>
                            <td>{{++$key}}</td>
                            <th>{{$discussion->user->name}}</th>
                            <th>{{$discussion->user->course->course}}</th>
                            <td>{!!$discussion->title!!}</td>
                            <td class="center">{!!$discussion->content!!}</td>
                            <td class="center"> {{$discussion->created_at->toDayDateTimeString()}} </td>
                            
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            
        
</body>
</html>
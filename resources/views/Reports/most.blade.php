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
                        
                        
                       
                        
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key=>$user)
                        <tr>
                            <td>{{++$key}}</td>
                            
                            
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            
        
</body>
</html>
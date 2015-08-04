<!DOCTYPE html>
<html>
<head>
    <script type='text/javascript' src="jquery/jquery.min.js"></script>
    <script type='text/javascript' src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Registration</title>
</head>
<body>
<div class="container">
    <h2>User Registers</h2>
    <br>
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>FirstName</th>
                <th>SurName</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Birthday</th>
                <th>Comments</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->firstname}}</td>
                <td>{{$user->surname}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->birthday}}</td>
                <td>{{$user->comments}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

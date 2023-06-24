<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
</head>
<body>
    <h1>Hello</h1>
    <h1>Role - {{Auth::user()->role}}</h1>

    <form action="{{route('logout')}}" method="post">
    @csrf
    <input type="submit" value="logout">

    </form>

</body>
</html>

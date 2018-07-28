<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<form method="POST">
    @csrf
    <input type="text" name="username" value="" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
</form>
</body>
</html>

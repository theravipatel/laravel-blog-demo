<h1>Session Login Demo</h1>
<br><br>
<form action="/session_login_process" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Username">
    <br><br>
    <input type="password" name="password" placeholder="Password">
    <br><br>
    <input type="submit" value="Submit">
</form>
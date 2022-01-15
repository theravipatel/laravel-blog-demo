<h1>Save Data to DB</h1>
<br>
<h4>{{session("msg")}}</h4>
<br>
<form action="save_data_process" method="POST">
    @csrf
    <input type="text" name="username" placeholder="Username">
    <br><br>
    <input type="text" name="first_name" placeholder="First Name">
    <br><br>
    <input type="text" name="last_name" placeholder="Last Name">
    <br><br>
    <input type="text" name="email" placeholder="Email">
    <br><br>
    <input type="password" name="password" placeholder="Password">
    <br><br>
    <input type="submit" value="Submit">
</form>
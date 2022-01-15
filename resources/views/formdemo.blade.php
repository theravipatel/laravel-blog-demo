<h1>Form Demo</h1>

<br>

<form action="formsubmit" method="POST">
    @csrf
    <input type="text" name="email" placeholder="Email">
    <br><br>
    <input type="password" name="password" placeholder="Password">
    <br><br>
    <input type="submit" value="Submit">
</form>
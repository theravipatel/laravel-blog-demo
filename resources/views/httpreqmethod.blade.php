<h1>Http Request Methods</h1>
<br>
<br>

<h3>HTTP GET Method Form</h3>
<form action="httpreq_process" method="GET">
    <input type="text" name="email" placeholder="Enter Email">
    <br>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
<br>
<br>

<h3>HTTP POST Method Form</h3>
<form action="httpreq_process" method="POST">
    @csrf
    <input type="text" name="email" placeholder="Enter Email">
    <br>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
<br>
<br>

<h3>HTTP PUT Method Form</h3>
<form action="httpreq_process" method="POST">
    @csrf
    @method("PUT")
    <input type="text" name="email" placeholder="Enter Email">
    <br>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>

<br>
<br>

<h3>HTTP DELETE Method Form</h3>
<form action="httpreq_process" method="POST">
    @csrf
    @method("DELETE")
    <input type="text" name="email" placeholder="Enter Email">
    <br>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
<h1>File Upload and Flash Session Demo</h1>

<br>
{{session("msg")}}
<br>
<form action="file_upload_process" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="email" placeholder="Email">
    <br><br>
    <input type="file" name="photo">
    <br><br>
    <input type="submit" value="Submit">
</form>
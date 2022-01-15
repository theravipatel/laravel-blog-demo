<h1>Data Edit</h1>

<br>

@if(isset($edit_data)) 
<form action="/edit_process" method="POST">
    @csrf
    <input type="hidden" name="id" id="id" value="{{$edit_data['id']}}">
    <input type="text" name="first_name" placeholder="First Name" value="{{$edit_data['first_name']}}">
    <br><br>
    <input type="text" name="last_name" placeholder="Last Name" value="{{$edit_data['last_name']}}">
    <br><br>
    <input type="text" name="email" placeholder="Email" value="{{$edit_data['email']}}">
    <br><br>
    <input type="submit" value="Submit">
</form>

@else

<table border="1" cellspacing="5">
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user["id"]}}</td>
        <td>{{$user["first_name"]}}</td>
        <td>{{$user["last_name"]}}</td>
        <td>{{$user["email"]}}</td>
        <td>
            <a href="edit/{{$user['id']}}">Edit</a>
             | 
            <a href="delete/{{$user['id']}}">Delete</a>
        </td>
    </tr>
    @endforeach
</table>
@endif
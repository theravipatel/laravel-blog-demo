<h1>Route Model Binding</h1>

<table border="1" cellspacing="5">
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
    </tr>
   
    <tr>
        <td>{{$users->id}}</td>
        <td>{{$users->first_name}}</td>
        <td>{{$users->last_name}}</td>
        <td>{{$users->email}}</td>
    </tr>

</table>
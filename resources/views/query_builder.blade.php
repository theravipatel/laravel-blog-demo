<h1>Query Builder Demo</h1>


<table border="1">
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
    </tr>
    @foreach($data as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->first_name}}</th>
        <td>{{$user->last_name}}</td>
    </tr>
    @endforeach
</table>
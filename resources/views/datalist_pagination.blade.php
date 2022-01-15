<h1>Data List with Pagination</h1>

<table border="1" cellspacing="5">
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user["id"]}}</td>
        <td>{{$user["first_name"]}}</td>
        <td>{{$user["last_name"]}}</td>
        <td>{{$user["email"]}}</td>
    </tr>
    @endforeach
</table>

<div>
    {{$users->links()}}
</div>

<style>
    .w-5{
        display: none;
    }
</style>
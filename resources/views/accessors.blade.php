<h1>Accessors Demo</h1>

<table border="1" cellspacing="5">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Address</th>
    </tr>
    @foreach($data as $company)
    <tr>
        <td>{{$company->id}}</td>
        <td>{{$company->name}}</td>
        <td>{{$company->address}}</td>
    </tr>
    @endforeach
</table>
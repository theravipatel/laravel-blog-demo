<h1>Http Client Demo</h1>

<table border="1" cellpadding="5">
    <thead>
        <th>Image</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
    </thead>
    <tbody>
        @foreach($data as $val)
        <tr>
            <td>
                <img src='{{$val["avatar"]}}' alt="">
            </td>
            <td>{{$val["first_name"]}}</td>
            <td>{{$val["last_name"]}}</td>
            <td>{{$val["email"]}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

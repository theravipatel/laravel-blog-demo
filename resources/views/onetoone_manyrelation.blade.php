<h1>One to One/Many Relation</h1>

<table border="1" cellspacing="5">
    <tr>
        <th>Id</th>
        <th>Categoty Id</th>
        <th>Product Name</th>
    </tr>
    @foreach($product_data as $product)
    <tr>
        <td>{{$product["id"]}}</td>
        <td>{{$product["cid"]}}</td>
        <td>{{$product["name"]}}</td>
    </tr>
    @endforeach
</table>
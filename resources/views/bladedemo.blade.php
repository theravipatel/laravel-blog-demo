@include("included_page")

<h1>If Statement</h1>

@if($ifdata['name']=="Ravi")
<h3>Hello {{$ifdata['name']}}</h3>
@else
<h3>Hello Unknown</h3>
@endif

<br><br>
<h1>For Loop</h1>
@for($i=1;$i<=10;$i++)
{{$i}}
<br>
@endfor

<br><br>
<h2>For Each Loop</h2>
@foreach($foreachdata as $data)
{{$data}}
<br>
@endforeach
<html>
<head>
	<title>Laravel</title>
</head>
<body>

<h1>{{ $name }}</h1>

<h4>Номер вопроса {{$num}}</h4>
<p>{{ $vopros}}</p>

<img width = "400" src = "/{{ $image }}" alt = ""/>

<h4>Варианты ответов</h4>
<ol>
	@foreach($varianti as $variant)
		@if($variant->verno == 1)
			<li style = "color: green;">{{$variant->name}}</li>
		@else
			<li>{{$variant->name}}</li>
		@endif
	@endforeach
</ol>

<h4>Комментарий</h4>

<p class = "comment">{!! $comment !!}</p>

<style>
	.comment span{
		background-color: blue;
		color: #fff;
	}
</style>

</body>
</html>

@include('header')

<div class = "row">
	<div class = "col-md-12">
		<a class = "btn btn-primary mobile_menu_float mobile_menu_pdd" href = "javascript:void(0);">выбрать тему</a>
	</div>
</div>		
<div class = "row">
	<div class = "col-md-12">
		<h1>{{$them->name}}</h1>
	</div>
</div>
<div class = "row">
	<div class = "col-md-9">
	   <div class = "pdd_content">
			@foreach($listpunkt as $punkt)
				<div class = "punkt_pravil">
					  {!! $punkt->text !!}
				</div>      
			@endforeach    
	   </div>
	</div>
	<div class = "col-md-3">
		<a class = "recent_changes " href = "/recent-changes">Последние изменения в ПДД</a>
		<ol class = "sidebar_menu">
			@foreach($pdd as $them)
				@if($seokey == $them->seokey)
				<li class = "active"><a href = "/pdd/{{$them->seokey}}">{{$them->name}}</a></li>
				@else
				<li><a href = "/pdd/{{$them->seokey}}">{{$them->name}}</a></li>    
				@endif    
			@endforeach    
		</ol>
	</div>
</div>

@include('footer')
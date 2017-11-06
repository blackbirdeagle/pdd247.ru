@include('header')

<div class = "row">
	<div class = "col-md-12">
		<a class = "btn btn-primary mobile_menu_float mobile_menu_bilety" href = "javascript:void(0);">выбрать билет</a>
	</div>
</div>		
<div class = "row">
	<div class = "col-md-12">
		<p class = "queryLabel">{{$queryLabel}}</p>
		<ul class = "voprosy"> 
			@foreach($voprosy as $vopros)
				@if($vopros->poradok == 1)
					<li><a id = "{{$vopros->poradok}}" class = "select" href = "#" onclick = "load_data({{$vopros->id}});">{{$vopros->poradok}}</a></li>
				@else
					<li><a id = "{{$vopros->poradok}}" href = "#" onclick = "load_data({{$vopros->id}});">{{$vopros->poradok}}</a></li>
				@endif
			@endforeach	
		</ul>				
	</div>
</div>
<div class = "row">
	<div class = "col-md-9">
		
		@foreach($voprosy as $vopros)
			@if($vopros->poradok == 1)			
				<p class = "name_vopros">{{$vopros->name}}</p>
				<div class = "img_vopros"><img src = "/{{$vopros->image}}" alt = ""/></div>
			@endif
		@endforeach						
		
			
		<h3>Варианты ответа</h3>	
		<ol class = "variants">
			@foreach($variants as $variant)
				<li o_id = "{{$variant->id}}" v_id = "{{$variant->vopros}}" stat = "{{$variant->verno}}"><span>{{ $variant->name }}</span></li>
			@endforeach
		</ol>

	</div>
	<div class = "col-md-3">
		<ol class = "sidebar_menu"> 
			@foreach($bileti as $bilet)
				@if($bil == $bilet->id)
					<li class = "active"><a href = "/bilety/{{$bilet->id}}">{{$bilet->name}}</a></li>
				@else
					<li><a href = "/bilety/{{$bilet->id}}">{{$bilet->name}}</a></li>
				@endif
			@endforeach	
		</ol>				
	</div>				
</div>			
	
@include('footer')
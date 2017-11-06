@include('header')

<div class = "row">
	<div class = "col-md-12">
		<a class = "btn btn-primary mobile_menu_float mobile_menu_them" href = "javascript:void(0);">выбрать тему</a>
	</div>
</div>			
<div class = "row">
	<div class = "col-md-12">
		<p class = "queryLabel">{{$queryLabel}}</p>
		<ul class = "voprosy">
			<?$item = 1;?>
			@foreach($voprosy as $vopros)
				@if($item == 1)
					<li><a id = "{{$item}}" class = "select" href = "#" onclick = "load_data({{$vopros->id}});">{{$item}}</a></li>
				@else
					<li><a id = "{{$item}}" href = "#" onclick = "load_data({{$vopros->id}});">{{$item}}</a></li>
				@endif
				<?$item++;?>
			@endforeach	
		</ul>				
	</div>
</div>
<div class = "row">
	<div class = "col-md-9">
		<?$item = 1;?>
		@foreach($voprosy as $vopros)
			@if($item == 1)    						
				<p class = "name_vopros">{{$vopros->name}}</p>
				<div class = "img_vopros"><img src = "/{{$vopros->image}}" alt = ""/></div>
			@endif        
			<?$item++;?>    
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
			@foreach($thems as $them)
				@if($id == $them->id)
					<li class = "active"><a >{{$them->name}}</a></li>
				@else
					<li><a href = "/temy/{{$them->id}}">{{$them->name}}</a></li>
				@endif
			@endforeach	
		</ol>				
	</div>				
</div>			
	
@include('footer')
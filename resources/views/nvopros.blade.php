@include('header')

<div class = "row">
	<div class = "col-md-12">
		<a class = "btn btn-primary mobile_menu_float mobile_menu_nv" href = "javascript:void(0);">выбрать N-е вопросы</a>
	</div>
</div>	
<div class = "row">
	<div class = "col-md-12">
		<p class = "queryLabel">{{$queryLabel}}</p>
		<ul class = "voprosy"> 
			<?php $i = 1;?>
			@foreach($voprosy as $vopros)
				@if($i == 1)
					<li><a id = "{{$i}}" class = "select" href = "#" onclick = "load_data({{$vopros->id}});">{{$i}}</a></li>
				@else
					<li><a id = "{{$i}}" href = "#" onclick = "load_data({{$vopros->id}});">{{$i}}</a></li>
				@endif
				<?php $i++;?>
			@endforeach	
		</ul>				
	</div>
</div>		
<div class = "row">
	<div class = "col-md-9">
		<?php $i = 1;?>
		@foreach($voprosy as $vopros)
			@if($i == 1)			
				<p class = "name_vopros">{{$vopros->name}}</p>
				<div class = "img_vopros"><img src = "/{{$vopros->image}}" alt = ""/></div>
			@endif
			<?php $i++;?>
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
			@foreach($nv as $item)
				@if($item->poradok == 3 || $item->poradok == 23 || $item->poradok == 33)
					@if($item->poradok == $id)
						<li class = "active"><a href = "/voprosy/{{$item->poradok}}">{{$item->poradok}} - и вопросы</a></li>
					@else	
						<li><a href = "/voprosy/{{$item->poradok}}">{{$item->poradok}} - и вопросы</a></li>
					@endif
				@else
					@if($item->poradok == $id)
						<li class = "active"><a href = "/voprosy/{{$item->poradok}}">{{$item->poradok}} - е вопросы</a></li>
					@else
						<li><a href = "/voprosy/{{$item->poradok}}">{{$item->poradok}} - е вопросы</a></li>
					@endif
				@endif
			@endforeach	
		</ol>				
	</div>
</div>

@include('footer')
@include('header')	

<div class = "row">
	<div class = "col-md-12">
		<h2>Ваш результат</h2>
		<p class = "c_errors"><b>{{$c_errors}}</b></p>				
	</div>
</div>
<div class = "row">
	<div class = "col-md-9">
		<div class = "e_list">	
			@foreach($e_list as $item)
				<div class = "vopros_item">
					<div class = "row">
						<div class = "col-md-12"><p class = "b_v">Билет {{$item['n_bilet']}} вопрос {{$item['n_vopros']}}</p></div>
					</div>
					<div class = "row">
						<div class = "col-md-12">
							<p class = "name_vopros">{{$item['n_name']}}</p>
						</div>
					</div>
					<div class = "row">
						<div class = "col-md-6">
							<div class = "e_vopros">
								<div class = "img_vopros"><img src = "/{{$item['n_image']}}"/></div>							
							</div>
						</div>
						<div class = "col-md-6">
							<ol class = "errors">
								@foreach($item['n_variant'] as $variant)
									@if($variant['v_stat'] == 0)
										<li class = "neverno"><span>{{$variant['v_name']}}</span></li>
									@else
										<li class = "verno"><span>{{$variant['v_name']}}</span></li>
									@endif	
								@endforeach	
							</ol>
						</div>
					</div>
					<div class = "row">
						<div class = "col-md-12">
							<h4>Комментарий</h4>
							<div class = "comment">
								{!! $item['n_comment'] !!}
							</div>
						</div>
					</div>
				</div>		
			@endforeach	
		</div>
	</div>
	<div class = "col-md-3">
		<a class = "recent_changes " href = "/recent-changes">Последние изменения в ПДД</a>
		<ol class = "sidebar_menu"> 
			@foreach($menu as $item)
				@if($slug != 'voprosy')
					<li><a href = "/{{$slug}}/{{$item->id}}">{{$item->name}}</a></li>
				@else
					@if($item->poradok == 3)
						<li><a href = "/{{$slug}}/{{$item->poradok}}">{{$item->poradok}} - и вопросы</a></li>
					@else
						<li><a href = "/{{$slug}}/{{$item->poradok}}">{{$item->poradok}} - е вопросы</a></li>
					@endif
				@endif
			@endforeach	
		</ol>				
	</div>
</div>
	
@include('footer')
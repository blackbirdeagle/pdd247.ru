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
		<div class = "comments__list">
			<p class = "comments__list__head">Оставить комментарий</p>			
			<div class = "review__form">
				<form role="form" method="GET" action = "">
					<div class="form-group form-group-cell1">
					  <label for="name">Ваше имя *</label>
					  <input type="text" class="form-control" id="name" placeholder="Ваше имя *">
					</div>
					<div class="form-group form-group-cell2">
					  <label for="city">Ваш город *</label>
					  <input type="text" class="form-control" id="city" placeholder="Ваш город *">
					</div>	
					<div class = "clear"></div>
					<div class="form-group">
					  <label for="comment">Ваш комментарий *</label>
					  <textarea class="form-control" id="comment" placeholder="Ваш комментарий *"></textarea>
					</div>
					<div class="form-group">
						<a id = "send__comment" href = "javascript:void(0);" class="btn btn-primary">Отправить</a>
					</div>
				</form>
			</div>
			<p class = "comments__list__head">Последние 10 отзывов и комментариев</p>
			@foreach($comments as $comment)
				<?
					$rnd = rand(1, 3);
					switch($rnd){
						case '1':
							$class__color = 'city__green';
							break;
						case '2':
							$class__color = 'city__blue';
							break;
						case '3':
							$class__color = 'city__orange';
							break;
					}					
				?>
				<div class = "comments__list__item">
					<div class = "comments__top">
						<p class = "comments__list__item__date">{{ date("d.m.Y H:i", strtotime($comment['created_at'])) }}</p>
						<p class = "comments__list__item__city <?=$class__color?>">{{ $comment['city'] }}</p>
					</div>
					<div class = "comments__bottom">
						<p class = "comments__list__item__name">{{ $comment['name'] }}</p>
						<p class = "comments__list__item__text">{{ $comment['comment'] }}</p>
					</div>
				</div>			
			@endforeach			
		</div>
	</div>
	<div class = "col-md-3">
		<a class = "recent_changes " href = "/recent-changes">Последние изменения в ПДД</a>
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
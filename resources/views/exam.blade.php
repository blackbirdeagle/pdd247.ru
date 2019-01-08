@include('header')
<div class = "row">
	<div class = "col-md-12">
		<h2>Экзамен</h2>
		<ul class = "exam_voprosy">
			<?$item = 1;?>
			@foreach($vopros as $vop)
				@if($item == 1)
					<li><a id = "{{$item}}" class = "select" href = "#" onclick = "exam_load_data({{$vop->id}});">{{$item}}</a></li>
				@else
					<li><a id = "{{$item}}" href = "#" onclick = "exam_load_data({{$vop->id}});">{{$item}}</a></li>
				@endif
				<?$item++;?>
			@endforeach	
		</ul>
	</div>
</div>

<div class = "row">
	<div class = "col-md-9">
		<?$item = 1;?>
		@foreach($vopros as $vop)
			@if($item == 1)    						
				<p class = "name_vopros">{{$vop->name}}</p>
				<div class = "img_vopros"><img src = "/{{$vop->image}}" alt = ""/></div>
			@endif        
			<?$item++;?>    
		@endforeach

		<h3>Варианты ответа</h3>	
		<ol class = "exam_variants">
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
	<div class = "col-md-3"></div>
</div>
@include('footer')
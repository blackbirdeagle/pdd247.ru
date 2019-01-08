@include('header')

<div class = "row">
	<div class = "col-md-12">
		<a class = "btn btn-primary mobile_menu_float mobile_menu_nv" href = "javascript:void(0);">выбрать N-е вопросы</a>
	</div>
</div>			
<div class = "row">
	<div class = "col-md-9">
		<div class = "pdd_content">
			<h1>N-е вопросы билетов ПДД 2018 с изменениями от 1 июля 2018 года</h1>
			<p>Готовиться к теоретическому экзамену в ГИБДД можно не только решая <a href = "/bilety">билеты</a> целиком, не только решая вопросы
			по <a href = "/temy">темам</a>, но, также решая N-е вопросы.</p>
			<p>Выбирайте любой понравившийся вам номер вопросов и решайте 40 предложенных вопросов не спеша, ведь это только подгогтовка к экзамену и каждый из вас сам выбирает сколько времени на нее потратить.
			Переход на следйющий вопрос производится автоматически, при этом если вы ответили на предыдущий вопрос верно, то он подсветится зеленым цветом, в противном случае красным.
			Как только вы ответите на все 20 вопросов, сайт автоматически покажет страницу результатов, где вы сможете ознакомиться со своими ошибками, если таковые будут.</p>		
			<p class = "udacha">ЖЕЛАЕМ УДАЧИ!</p>			
		</div>
	</div>
	<div class = "col-md-3">
		<a class = "recent_changes " href = "/recent-changes">Последние изменения в ПДД</a>
		<ol class = "sidebar_menu"> 
			@foreach($nv as $item)
				@if($item->poradok == 3)
					<li><a href = "/voprosy/{{$item->poradok}}">{{$item->poradok}} - и вопросы</a></li>
				@else
					<li><a href = "/voprosy/{{$item->poradok}}">{{$item->poradok}} - е вопросы</a></li>
				@endif
			@endforeach	
		</ol>	
	</div>
</div>

@include('footer')
@include('header')
	

<div class = "row">
	<div class = "col-md-12">
		<a class = "btn btn-primary mobile_menu_float mobile_menu_bilety" href = "javascript:void(0);">выбрать билет</a>
	</div>
</div>			
<div class = "row">
	<div class = "col-md-9">
		<div class = "pdd_content">
			<h1>Новые билеты ПДД 2018 онлайн для категорий А, В, М, A1, B1</h1>
			<p>В данном разделе вам предлагается решить 40 билетов теоретического экзамена. В каждом билете по 20 вопросов, комментарии к которым можно посмотреть в случае неправильных ответов.
			Все вопросы разделены по тематическим блокам, ознакомиться с которыми можно <a href = "/tematic">здесь</a>.</p>
			<p>Выбирайте любой понравившийся Вас билет и решайте его не спеша, ведь это только подгогтовка к экзамену и каждый из вас сам выбирает сколько времени на нее потратить.
			Переход на следйющий вопрос производится автоматически, при этом если вы ответили на предыдущий вопрос верно, то он подсветится зеленым цветом, в противном случае красным.
			Как только вы ответите на все 20 вопросов, сайт автоматически покажет страницу результатов, где вы сможете ознакомиться со своими ошибками, если таковые будут.</p>
			<p class = "udacha">ЖЕЛАЕМ УДАЧИ!</p>
		</div>
	</div>
	<div class = "col-md-3">
		<ol class = "sidebar_menu"> 
			@foreach($bileti as $bilet)
				<li><a href = "/bilety/{{$bilet->id}}">{{$bilet->name}}</a></li>
			@endforeach	
		</ol>				
	</div>
</div>

	
@include('footer')
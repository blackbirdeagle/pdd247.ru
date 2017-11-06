@include('header')

<div class = "row">
	<div class = "col-md-12">
		<h1>Таблица соответствия между темами ПДД и вопросами билетов</h1>	
	</div>
</div>
<div class = "row">
    <div class = "col-md-9">
        <div class="price_table">
            <div class="row table_head table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 col_head">Название темы</div>
                <div class="col-md-4 col-sm-4 col-xs-4 col_head">Номера вопросов в билетах</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Разделы ПДД "Общие положения", "Общие обязанности водителей".
                <br/>Разделы "Обязанности пешеходов и пассажиров".</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">1</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Приложение 1 ПДД "Дорожные знаки"</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">2, 3 и 4</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Приложение 2 ПДД "Дорожная разметка и ее характеристики"</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">5</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Раздел ПДД "Применение специальных сигналов".<br/>Раздел ПДД "Сигналы светофора и регулировщика"</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">6</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Раздел ПДД "Применение аварийной сигнализации и знака аварийной остановки". <br/>Раздел ПДД "Начало движения, маневрирование.</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">7, 8 и 9</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Раздел ПДД "Расположение транспортных средств на проезжей части". <br/>Раздел ПДД "Скорость движения".</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">10</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Раздел ПДД "Обгон, опережение, встречный разъезд"</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">11</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Раздел ПДД "Остановка и стоянка"</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">12</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Раздел ПДД "Проезд перекрестка"</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">13, 14 и 15</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Раздел ПДД "Пешеходные переходы и места остановок маршрутных транспортных средств". <br/>Раздел ПДД "Движение через железнодорожные пути".
                <br/> Раздел 16 ПДД "Движение по автомагистралям". <br/> Раздел ПДД "Движение в жилых зонах". <br/> Раздел ПДД "Приоритет маршрутных транспортных средств".</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">16</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Раздел ПДД "Пользование внешними световыми приборами и звуковыми сигналами". <br/>
                Раздел ПДД "Буксировка механических транспортных средств".<br/> Раздел ПДД "Учебная езда".<br/>Раздел ПДД "Перевозка людей".
                <br/>Раздел ПДД "Перевозка грузов". <br/> Раздел ПДД "Дополнительные требования к движению велосипедистов и водителей мопедов".
                <br/>Раздел ПДД "Дополнительные требования к движению гужевых повозок, а также к прогону животных".</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">17</div>
            </div>
            <div class="row table_col">
                <div class="col-md-8 col-sm-8 col-xs-8 cell_head">Основные положения по допуску транспортных средств к эксплуатации и обязанности должностных лиц по обеспечению безопасности дорожного движения. <br/>
                Основы безопасности дорожного движения.<br/>Оказание первой медицинской помощи.<br/>Ответственность водителя.</div>
                <div class="col-md-4 col-sm-4 col-xs-4 cell_head">18, 19 и 20</div>
            </div>                
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
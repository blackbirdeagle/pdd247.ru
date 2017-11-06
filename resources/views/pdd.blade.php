@include('header')

<div class = "row">
    <div class = "col-md-12">
        <a class = "btn btn-primary mobile_menu_float mobile_menu_pdd" href = "javascript:void(0);">выбрать тему</a>
    </div>
</div>	    
<div class = "row">
    <div class = "col-md-9">
        <h1>Правила дорожного движения Российской Федерации</h1>
        <p>В редакции постановлений Правительства РФ от 8 января 1996 г. №3,
        от 31 октября 1998 г. №1272, от 21 апреля 2000 г. №370, от 24 января 2001 г. №67, от 28 июня 2002 г. №472, от 7 мая 2003 г. №265,
        от 25 сентября 2003 г. №595, от 14 декабря 2005 г. №767, от 28 февраля 2006 г. №109, от 16 февраля 2008 г. №84,
        от 19 апреля 2008 г. №287, от 29 декабря 2008 г. №1041, от 27 января 2009 г. №28, от 24 февраля 2010 г. №87, от 10 мая 2010 г. №316,
        от 6 октября 2011 г. №824, от 23 декабря 2011 г. №1113, от 28 марта 2012 г. №254, от 12 ноября 2012 г. №1156,
        от 21 января 2013 г. №20, от 30 января 2013 г. №64, от 5 июня 2013 г. №476, от 23 июля 2013 г. №621, от 17 декабря 2013 г. №1176,
        от 22 марта 2014 г. №221, от 30 июля 2014 г.№714, от 24 октября 2014 г. №1097, от 14 ноября 2014 г. №1197, от 19 декабря 2014 г. №1423,
        от 2 апреля 2015 г. №315, от 20 апреля 2015 г. №374, от 30 июня 2015 г. №652, от 2 ноября 2015 г. №1184, от 21 января 2016 г. №23,
        от 30 мая 2016 г. №477, от 20 июля 2016 г. №700, от 23 июля 2016 г. №715, от 10 сентября 2016 г. №904, от 24 марта 2017 г. №333, с изменениями, внесенными решением
        Верховного Суда РФ от 29 сентября 2011 г. №ГКПИ11-610)</p>
    </div>
    <div class = "col-md-3">
        <ol class = "sidebar_menu">
            @foreach($pdd as $them)
                <li><a href = "/pdd/{{$them->seokey}}">{{$them->name}}</a></li>
            @endforeach    
        </ol>
    </div>
</div>
      
@include('footer')
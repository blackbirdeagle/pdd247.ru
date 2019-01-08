<!DOCTYPE html>
<html lang = "ru">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="yandex-verification" content="4b5ca78705e24496" />
	
	@if($seo->keywords != "")
		<meta name = "keywords" content = "{{$seo->keywords}}">
	@else
		<meta name = "keywords" content = "{{$seo->name}}">
	@endif

	@if($seo->description != "")
		<meta name = "description" content = "{{$seo->description}}">
	@else
		<meta name = "description" content = "{{$seo->name}}">	
	@endif
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

	<link href="/static/css/bootstrap.min.css" rel="stylesheet">
	<link href="/static/css/style.css" rel="stylesheet">
	
	@if($seo->name != "")
		<title>{{$seo->name}}</title>
	@else
		<title>ПДД 2018 с изменениями от 1 июля 2018 года</title>
	@endif	
</head>
<body>
	<!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter45211113 = new Ya.Metrika({ id:45211113, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/45211113" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-102177418-1', 'auto');
	  ga('send', 'pageview');

	</script>
	
	<!-- Rating@Mail.ru counter -->
	<script type="text/javascript">
	var _tmr = window._tmr || (window._tmr = []);
	_tmr.push({id: "2924644", type: "pageView", start: (new Date()).getTime()});
	(function (d, w, id) {
	  if (d.getElementById(id)) return;
	  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
	  ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
	  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
	  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
	})(document, window, "topmailru-code");
	</script><noscript><div>
	<img src="//top-fwz1.mail.ru/counter?id=2924644;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
	</div></noscript>
	<!-- //Rating@Mail.ru counter -->

	<!-- Top100 (Kraken) Counter -->
	<script>
		(function (w, d, c) {
		(w[c] = w[c] || []).push(function() {
			var options = {
				project: 4504594,
				trackHashes: true,
				user_id: null
			};
			try {
				w.top100Counter = new top100(options);
			} catch(e) { }
		});
		var n = d.getElementsByTagName("script")[0],
		s = d.createElement("script"),
		f = function () { n.parentNode.insertBefore(s, n); };
		s.type = "text/javascript";
		s.async = true;
		s.src =
		(d.location.protocol == "https:" ? "https:" : "http:") +
		"//st.top100.ru/top100/top100.js";

		if (w.opera == "[object Opera]") {
		d.addEventListener("DOMContentLoaded", f, false);
	} else { f(); }
	})(window, document, "_top100q");
	</script>
	<noscript>
	  <img src="//counter.rambler.ru/top100.cnt?pid=4504594" alt="Топ-100" />
	</noscript>
	<!-- END Top100 (Kraken) Counter -->

	<header class = "header">
		<div class = "container">
			<div class = "row"> 
				<div class = "col-md-2">
					<a class = "logo" href = "/"><img src = "/images/logo.png" alt = "ПДД 2018"/></a>
				</div>
				<div class = "col-md-10">
					<a class = "show_menu" href = "javascript:void(0);"><img src = "/images/mob_btn.png" /></a>	
					<ul class="nav navbar-nav mobile_menu">
						<li><a class = "active" href="/bilety"><span>Билеты</span></a></li>						
						<li><a href="/temy"><span>Темы</span></a></li>						
						<li><a href="/voprosy"><span>N-вопросы</span></a></li>						
						<li><a href="/exam"><span>Экзамен</span></a></li>
						<li><a href="/marafon"><span>Марафон</span></a></li>
						<li><a href = "/pdd">ПДД 2018</a></li>	
					</ul>
				</div>	
			</div>
		</div>	
	</header>
	<section class = "wrapper">
		<div class = "container">		
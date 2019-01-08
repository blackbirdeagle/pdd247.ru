<?php

Admin::menu()->url('/')->label('Стартовая страница')->icon('fa-dashboard');

Admin::menu('\App\Page')->label('Страницы')->icon('fa-bank');
Admin::menu('\App\Bileti')->label('Билеты')->icon('fa-bank');
Admin::menu('\App\Temy')->label('Темы')->icon('fa-bank');
Admin::menu('\App\Voprosi')->label('Вопросы')->icon('fa-bank');
Admin::menu('\App\Varianti')->label('Варианты ответов к вопросам')->icon('fa-bank');
Admin::menu('\App\Pdd')->label('ПДД 2017 Темы')->icon('fa-bank');
Admin::menu('\App\Listpunkt')->label('Список пунктов ПДД')->icon('fa-bank');
Admin::menu('\App\Articles')->label('Статьи')->icon('fa-bank');
Admin::menu('\App\Video')->label('Видео')->icon('fa-bank');
Admin::menu('\App\Banners')->label('Баннеры')->icon('fa-bank');
Admin::menu('\App\Comments')->label('Комментарии')->icon('fa-bank');

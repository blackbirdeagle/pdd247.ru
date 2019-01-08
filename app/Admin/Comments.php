<?php
/*
* Copyright by Alexander Afanasyev
* E-mail: blackbirdeagle@mail.ru
* Skype: al_sidorenko1
* */
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
Admin::model('\App\Comments')->title('Комментарии')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Имя автора'),
		Column::string('city')->label('Город автора'),
		Column::string('created_at')->label('Дата отзыва'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Имя автора')->required(),
		FormItem::text('city', 'Город автора')->required(),
		FormItem::textarea('comment', 'Текст комментария')->required(),
	]);
	return $form;
});

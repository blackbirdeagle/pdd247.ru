<?php
Admin::model('\App\Reviews')->title('Отзывы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('fio')->label('ФИО автора'),
		Column::string('date')->label('Дата отзыва'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('fio', 'Фамилия Имя Отчество')->required()->unique(),
		FormItem::textarea('text', 'Текст отзыва')->required(),
		FormItem::date('date', 'Дата отзыва')->required(),
	]);
	return $form;
});
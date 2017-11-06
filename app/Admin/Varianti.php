<?php
Admin::model('\App\Varianti')->title('Варианты ответов к вопросам')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('vopros')->label('ID вопроса'),
		Column::string('name')->label('Текст варианта'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('vopros', 'ID вопроса'),
		FormItem::text('name', 'Текст варианта'),
		FormItem::checkbox('verno', 'Является ли правильным'),
	]);
	return $form;
});